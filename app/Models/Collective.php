<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CollectiveDetail;

class Collective extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_collective','total'
    ];

    public function collective_detail(){
    	return $this->hasMany(CollectiveDetail::class);
    }
}
