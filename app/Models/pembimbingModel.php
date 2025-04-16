<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pembimbingModel extends Model
{
    use HasFactory;
    protected $table ='data_pembimbing';
    protected $primaryKey ='id';
}
