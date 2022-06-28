<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransactionDoctor extends Model
{
    use softDeletes;

    protected $fillable = [
        'doctor_packages_id', 'user_id', 'type_doctor', 'transaction_total', 'transaction_status'

    ];

    protected $hidden = [

    ];

    public function details(){
        return $this->hasMany(TransactionDetailDoctor::class, 'transactions_doctor_id','id');
    }
   
    public function doctor_package(){
        return $this->belongsTo(DoctorPackage::class, 'doctor_packages_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}