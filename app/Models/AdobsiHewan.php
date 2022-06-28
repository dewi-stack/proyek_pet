<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdobsiHewan extends Model
{
    use softDeletes;

    protected $fillable = [
        'nama', 'email', 'alamat', 'deskripsi', 'jenis', 'image'

    ];

    protected $hidden = [

    ];
}
