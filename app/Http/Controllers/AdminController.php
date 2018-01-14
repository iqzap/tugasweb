<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdminController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('admin.login_admin');
    }
    public function logoutAdmin(){
        return view('admin.login_admin');
    }
    public function getHome(){
        return view('admin.home_admin');
    }
    
    public function valid(Request $request){
        $admin = DB::table('admins')->where('id_admin', '1')->first();
        $id = $admin->id_admin;
        $password = $admin->password;
        if($id == $request->request->get('id_admin') && $password == $request->request->get('password')){
            return redirect('/admin/tabel');
        }
        else{
            return redirect()->back()->with(['error' => 'Error']);
        }
        
    }
    
    public function getTabel(){
        $data = Barang::paginate(8);
        return view('admin.tabel_admin',compact('data'));
    }
    
    public function addBarang(){
        return view('admin.addBarangView_admin');
    }
    
    public function store(Request $request){
        $this->validate($request,['_token' => 'required','id_barang' => 'required','nama_barang' => 'required', 'jumlah_barang' => 'required', 'deskripsi' => 'required',]);
        $foto = $request->file('gambar');
        $namaImage = $foto->getClientOriginalName();
        $destination =  base_path() . '/public/gambar_barang';
        $foto->move($destination, $namaImage);
         DB::table('barangs')->insert(['_token' => $request->_token,'id_barang' => $request->id_barang,'nama_barang' => $request->nama_barang,'harga_barang' => $request->harga_barang,'jumlah_barang' => $request->jumlah_barang, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),  'gambar' => $namaImage, 'deskripsi' => $request->deskripsi ]);
        return redirect()->route('admin.tabel');
    }
    
    public function getUpdateView($id){
        $data = DB::table('barangs')->where('id_barang', $id)->first();
      return view('admin.updateView_admin', compact('data', 'id'));
    }
    
    public function update(Request $request){

        $foto = $request->file('gambar');
        $image = \DB::table('barangs')->where('id_barang', $request->id_barang)->first();
        $file= $image->gambar;
        $filename = public_path().'/gambar_barang/'.$file;
        \File::delete($filename);
        
        $namaImage = $foto->getClientOriginalName();
        DB::table('barangs')->where('id_barang', $request->id_barang)->update(['_token' => $request->_token,'nama_barang' => $request->nama_barang, 'harga_barang' => $request->harga_barang,'jumlah_barang' => $request->jumlah_barang, 'updated_at' => date("Y-m-d H:i:s"), 'gambar' => $namaImage, 'deskripsi' => $request->deskripsi ]);
        $destination = base_path() . '/public/gambar_barang'; 
        $foto->move($destination, $namaImage); 
        return redirect()->route('admin.tabel');
    }
    
    public function delete($id){
        $image = \DB::table('barangs')->where('id_barang', $id)->first();
        $file= $image->gambar;
        $filename = public_path().'/gambar_barang/'.$file;
        \File::delete($filename);
        DB::table('barangs')->select('gambar')->where('id_barang', $id)->delete();
        return redirect()->back();
    }
    
    public function getUser(){
        $data = DB::table('users')->get();
        return view('admin.tabel_user', compact('data'));
    }
    
    public function deleteUser($id){
        DB::table('users')->where('nrp', $id)->delete();
        return redirect()->back();
    }
    
    public function getStatistik(){
        $data = DB::table('detail_notas')->groupBy('nama_barang_nota')->get(['nama_barang_nota', DB::raw('SUM(jumlah_barang_nota) AS jumlah')]);
        return view('admin.statistik',compact('data'));
    }
    
    public function getListBanner(){
        $data = DB::table('notas')->orderBy('created_at', 'desc')->get();
        
       return view('admin.list_banner_admin', compact('data'));
    }
    
    public function addBannerView(){
        return view('admin.addBannerView');
    }
    
    public function addBanner(Request $request){
        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $namaFoto = $foto->getClientOriginalName();
            $destination = public_path().'/banner/';
            $foto->move($destination, $namaFoto);
            DB::table('banners')->insert(['nama_banner' => $namaFoto]);
            return redirect()->route('admin.banner');
        }
      
    }
    
    public function deletebanner($nama){
        DB::table('banners')->where('nama_banner', $nama)->delete();
        $filename = public_path().'/banner/'.$nama;
        \File::delete($filename);
        return redirect()->back();
    }
    public function gantiStatus($id){
        DB::table('notas')->where('id_pesanan', $id)->update(['status' => 1]);
        return redirect()->route('admin.banner');
    }
}