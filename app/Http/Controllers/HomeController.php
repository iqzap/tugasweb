<?php

namespace App\Http\Controllers;
use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::paginate(8);
        $ranking = DB::table('detail_notas')->select('nama_barang_nota')->groupBy('nama_barang_nota')->orderBy(DB::raw('count(nama_barang_nota)'), 'desc')->take(5)->get();
			return view('utama',compact('data', 'ranking'));
    }
    
    public function getDetailBarang($id){
        $data = DB::table('barangs')->where('id_barang', $id)->get();
        return view('detailBarang',compact('data'));
    }
    
    public function addKeranjang(Request $request, $id){
        echo $id;
        echo $request->number;
        if($request->number < 1){
            return redirect()->back()->with(['error' => 'Anda niat pesan enggak']);
        }
        else{
            $jumlah_barang = DB::table('barangs')->select('jumlah_barang')->where('id_barang', $id)->first();
            $jumlah_barang = (array)$jumlah_barang;
            if($jumlah_barang['jumlah_barang'] < $request->number){
                return redirect()->back()->with(['error' => 'Maaf stok tidak cukup']);
            }
            else{
                $id_user = Auth::user()->nrp;
                $barang = DB::table('barangs')->select('nama_barang','harga_barang')->where('id_barang', $id)->first();
                echo $barang->harga_barang;
                $harga = $barang->harga_barang * $request->number;

                DB::table('keranjangs')->insert(['id_user' => $id_user, 'nama_barang' => $barang->nama_barang, 'jumlah' => $request->number, 'harga' => $harga]);
                return redirect()->back();
            }
        }
        
    }
    
    public function listKeranjang(){
        $data = DB::table('keranjangs')->where('id_user', Auth::user()->nrp)->get();
        return view('listKeranjang', compact('data'));
    }
    
    public function deleteListKeranjang($nama){
        DB::table('keranjangs')->where(['nama_barang' => $nama,'id_user' => Auth::user()->nrp])->delete();
        return redirect()->back()->with(['success' => 'Delete berhasil']);
    }
    
    public function submitKeranjang(Request $request,$total){
        $this->validate($request,['lokasi' => 'required',] );
        $nrp = Auth::user()->nrp;
        $uuid = Uuid::uuid1()->getHex();
        DB::table('notas')->insert(['id_pesanan' => $uuid,'id_user' => $nrp , 'total_harga' => $total, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'lokasi' => $request->lokasi]);
        $data = DB::table('keranjangs')->where('id_user', $nrp)->get();
        foreach($data as $index=>$barang){
            DB::table('detail_notas')->insert(['id_pesanan_nota' => $uuid, 'nama_barang_nota' => $barang->nama_barang,'jumlah_barang_nota' => $barang->jumlah, 'harga_barang_nota' => $barang->harga, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ]);
            $jumlah = DB::table('barangs')->select('jumlah_barang')->where('nama_barang', $barang->nama_barang)->first();
            $jumlah = (array)$jumlah;
            $qty = $jumlah['jumlah_barang'] - $barang->jumlah;
            DB::table('barangs')->where('nama_barang', $barang->nama_barang)->update(['jumlah_barang' => $qty]);
        }
        $lokasi = $request->lokasi;
        DB::table('keranjangs')->where('id_user', Auth::user()->nrp)->delete();
        $data  = DB::table('detail_notas')->where('id_pesanan_nota', $uuid)->get();
        return view('notaView', compact('data', 'lokasi'));
//        return redirect('/home')->with(['success' => 'Pesanan Berhasil Dipesan', 'NB' => 'Nota otomatis terdownload, silahkan tunjukan ke petugas yang mengantarkan makanan', 'lokasi' => $lokasi, 'id' => $uuid ]);
    }
       
    public function cetak_nota($uuid){
        $data  = DB::table('detail_notas')->where('id_pesanan_nota', $uuid)->get();
        $lokasi = DB::table('notas')->select('lokasi')->where('id_pesanan', $uuid)->first();
        $lokasi = (array)$lokasi;
        $lokasi = $lokasi['lokasi'];
        $pdf = PDF::loadView('notaView', compact('data', 'lokasi'));
        return $pdf->download('nota' . Auth::user()->name . date("Y-m-d H:i:s"));
    }
    
    public function searchajax(Request $request){
         if($request->ajax())
            {
                $output="";
                        DB::table('isi_search')->where('id', 1)->update(['search' => $request->search]);
                        $products=DB::table('barangs')->where('nama_barang','LIKE','%'.$request->search."%")->take(4)->get(); 
                        if(count($products)){
                        $url = "detail_barang_view";
                        foreach ($products as $index => $product) {
                            $output.='<tr>'.
                            '<td>'.'<a href="http://localhost/project_workshop/public/home/detailbarang/'. $product->id_barang .'">'.$product->nama_barang.'</a>'.'</td>'.
                            '</tr>';
                        }
                        return Response($output);  
                    }        
                
            }
              
         }
    
    public function getHasilPencarian(){
        $isi = DB::table('isi_search')->select('search')->where('id', 1)->first();
        $isi = (array)$isi;
        $search = $isi['search'];
        $data = DB::table('barangs')->where('nama_barang', 'LIKE', '%'.$search.'%')->get();
        return view('hasil_pencarian', compact('data', 'search'));
    }
    
   
}
