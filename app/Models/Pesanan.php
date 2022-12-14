<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id', 'jumlah',
    ];

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
