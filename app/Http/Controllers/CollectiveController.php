<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Menu;
use App\Models\Collective;
use App\Models\CollectiveDetail;
use App\Models\CollectiveDetailMenu;

class CollectiveController extends Controller
{
    public function index(){
    	$collective = Collective::all();
    	return view('dashboard.collective', compact('collective'));
    }

    public function pilihMenuCollective(Request $request){
    	dd($request->id_user);
    }
}
