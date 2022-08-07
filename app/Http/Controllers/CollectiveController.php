<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Collective;
use App\Models\CollectiveDetail;
use App\Models\CollectiveDetailMenu;

class CollectiveController extends Controller
{
    public function index(){
    	$collective = Collective::with('collective_detail')->get();
    	$ket = 'collective';
    	dd($collective);
    	return view('dashboard.collective', compact('collective','ket'));
    }

    public function pilihMenuCollective(Request $request){
    	// dd($request);
    	$collective = Collective::where('nama_collective', $request->namaCollective)->first();
    	if(!$collective){
    		$collective = new Collective;
    		$collective->nama_collective = $request->namaCollective;
    		$collective->save();
    	}
    	$collectiveDetail = CollectiveDetail::where('nama', $request->username)
    										->where('collective_id', $collective->id)
    										->first();
    	if(!$collectiveDetail){    		
	    	$collectiveDetail = new CollectiveDetail;
	    	$collectiveDetail->collective_id = $collective->id;
			$collectiveDetail->nama = $request->username;
			$collectiveDetail->save();
    	}

    	// dd($collectiveDetail);

    	$menus = Menu::all();
    	$data['nama_collective'] = $request->namaCollective;
    	$data['username'] = $request->username;
    	$data['collective_id'] = $collective->id;
    	$data['collectiveDetail_id'] = $collectiveDetail->id;
    	// dd($data);
    	return view('dashboard.collective-menu', compact('menus','data'));
    }
    public function getCollectiveDetailMenu(){
    	$pesanan = CollectiveDetailMenu::all();
    	return response()->json($pesanan);
    }
    public function checkOutCollective($id){
    	$checkOut = CollectiveDetailMenu::where('collective_detail_id', $id)->with('menu')->get();
    	// dd($checkOut);
    	return view('dashboard.checkOutCollective', compact('checkOut','id'));
    }
    public function keranjangCollective(Request $request){
    	$id = $request->id;
    	$collective_id = $request->collective_id;
    	$menu = Menu::find($id);
    	$cari_pesanan = CollectiveDetailMenu::where('menu_id', $id)
											->where('collective_detail_id', $collective_id)
											->first();
    	$pesanan;
    	$status = '0';

    	if($cari_pesanan){
    		$cari_pesanan->jumlah += 1;
    		$cari_pesanan->subtotal = $cari_pesanan->jumlah*$menu->Harga;
    		$cari_pesanan->save(); 
    		$status = '200';
    	}
    	else{
	    	$pesanan = new CollectiveDetailMenu;
	    	$pesanan->collective_detail_id = $collective_id;
	    	$pesanan->menu_id = $id;
    		$pesanan->jumlah = 1;
    		$pesanan->subtotal = $menu->Harga;
    		$pesanan->save();
    		$status = '200';
    	}
    	return response()->json($status);
    }
    public function updateCollectiveDetailMenu(Request $request){
    	$status = '0';
    	$cari_pesanan = CollectiveDetailMenu::where('menu_id', $request->menu_id)
											->where('collective_detail_id', $request->collective_id)
											->first();
    	$cari_pesanan->jumlah = $request->jml;
    	$cari_pesanan->subtotal = $request->subtotal;
    	$cari_pesanan->save();

    	if($cari_pesanan){
    		$status = '200';
    	}
    	
    	return response()->json($cari_pesanan);
    }
    public function beliCollective(Request $request, $id){
    	$collectiveDetail = CollectiveDetail::where('id', $id)->first();
    	$collectiveDetail->total = $request->total;
    	$collectiveDetail->save();

    	return redirect()->action([CollectiveController::class, 'index']);
    }    
}
