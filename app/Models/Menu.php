<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;
use App\Models\CollectiveDetailMenu;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nama', 'Gambar', 'Harga', 'Kategori', 'Terjual',
    ];

    public function pesanan(){
    	return $this->belongsTo(Pesanan::class);
    }

    public function collective_detail_menu(){
    	return $this->belongsTo(CollectiveDetailMenu::class);
    }
}
