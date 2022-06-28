<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransactionDetailDoctor extends Model
{
    use softDeletes;

    protected $fillable = [
        'transactions_doctor_id', 'username', 'genre', 'animal', 'is_times', 'doe_date', 'jam'

    ];

    protected $hidden = [

    ];

    public function transaction_doctor(){
        return $this->belongsTo(TransactionDoctor::class, 'transactions_doctor_id','id');
    }
   
 
}