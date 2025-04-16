<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class adminModel1 extends Model
{
    use HasFactory;
    protected $table ='data_admin';
    protected $primaryKey ='id';
}
