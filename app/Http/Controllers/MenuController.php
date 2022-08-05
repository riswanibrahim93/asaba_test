<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;

class MenuController extends Controller
{
    public function index(){
    	$menus = Menu::all();
    	return view('dashboard.index', compact('menus'));
    }
    public function getPesanan(){
    	$pesanan = Pesanan::all();
    	return response()->json($pesanan);
    }
    public function checkOut(){
    	$checkOut = Pesanan::with('menu')->get();
    	// dd($checkOut);
    	return view('dashboard.checkOut', compact('checkOut'));
    }
    public function keranjang(Request $request){
    	$id = $request->id;
    	$menu = Menu::find($id);
    	$cari_pesanan = Pesanan::where('menu_id', $id)->first();
    	$pesanan;
    	$status = '0';

    	if($cari_pesanan != null){
    		$cari_pesanan->jumlah += 1;
    		$cari_pesanan->subtotal = $cari_pesanan->jumlah*$menu->Harga;
    		$cari_pesanan->save(); 
    		$status = '200';
    	}
    	else{
	    	$pesanan = new Pesanan;
	    	$pesanan->menu_id = $id;
    		$pesanan->jumlah = 1;
    		$pesanan->subtotal = $menu->Harga;
    		$pesanan->save();
    		$status = '200';
    	}
    	return response()->json($status);
    }    
    public function updatePesanan(Request $request, $id){
    	$status = '0';
    	$cari_pesanan = Pesanan::where('id', $id)->first();
    	$cari_pesanan->jumlah = $request->jml;
    	$cari_pesanan->subtotal = $request->subtotal;
    	$cari_pesanan->save();

    	if($cari_pesanan){
    		$status = '200';
    	}
    	
    	return response()->json($status);
    }
    public function beli(){
    	Pesanan::truncate();
    	return redirect()->action([MenuController::class, 'index']);
    }
}
