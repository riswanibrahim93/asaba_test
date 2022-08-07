<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collective;
use App\Models\CollectiveDetailMenu;

class CollectiveDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'collective_id', 'nama','total'
    ];

    public function collective(){
        return $this->belongsTo(Collective::class);
    }

    public function collective_detail_menu(){
    	return $this->hasMany(CollectiveDetailMenu::class);
    }
}
