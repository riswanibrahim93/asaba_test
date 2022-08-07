<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\CollectiveDetail;

class CollectiveDetailMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'collective_detail_id', 'menu_id',
    ];

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    public function collective_detail(){
        return $this->belongsTo(CollectiveDetail::class);
    }
}
