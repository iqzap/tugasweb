<?php
use App\Barang;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
		$data = DB::table('barangs')->get();
			return view('gajis.tampil_gaji',compact('data'));
        //
    }
}
