<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class GromingPackage extends Model
{
    use softDeletes;

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'discount', 'type_animal', 'type_menu', 'date_groming',
        'times', 'type_groming', 'price'

    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'groming_packages_id', 'id');
    }

}