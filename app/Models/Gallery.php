<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Gallery extends Model
{
    use softDeletes;

    protected $fillable = [
        'groming_packages_id', 'image',

    ];

    protected $hidden = [

    ];
    public function groming_package(){
        return $this->belongsTo(GromingPackage::class, 'groming_packages_id', 'id');
    }
   
}
