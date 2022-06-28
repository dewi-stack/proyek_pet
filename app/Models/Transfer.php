<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transfer extends Model
{
    use softDeletes;

    protected $fillable = [
        'image', 'bank','transfer_id', 'nama', 'nomor', 'total',

    ];

    protected $hidden = [

    ];

    public function transfer(){
        return $this->belongsTo(Transaction::class, 'transfer_id','id');
    }
   

   
}
