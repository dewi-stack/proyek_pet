<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaction extends Model
{
    use softDeletes;

    protected $fillable = [
        'groming_packages_id', 'user_id', 'type_animals', 'transaction_total', 'transaction_status'

    ];

    protected $hidden = [

    ];

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id','id');
    }

    public function transfer()
    {
        return $this->hasMany(Transfer::class, 'transfer_id', 'id');
    }
   
    public function groming_package(){
        return $this->belongsTo(GromingPackage::class, 'groming_packages_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    
}
