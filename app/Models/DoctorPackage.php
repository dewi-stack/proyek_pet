<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class DoctorPackage extends Model
{
    use softDeletes;

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'discount', 'type_doctor', 'type_menu', 'date_doctor',
        'times', 'type_rawat', 'price'

    ];

    protected $hidden = [

    ];

    public function gallery(){
        return $this->hasMany(GalleryDoctor::class, 'doctor_packages_id', 'id');
    }
}
