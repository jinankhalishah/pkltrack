<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AdminModel extends Model
{
    use HasFactory;
    protected $table ='data_admin';
    protected $primaryKey ='id';

    //relasi ke model arsip
    // public function arsip()
    // {
    //     return $this->hasMany(Arsip::class, 'id_admin');
    // }

}
