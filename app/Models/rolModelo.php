<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolModelo extends Model
{
    use HasFactory;
    protected $table = 'Roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = ['id_rol','nombre_rol'];
}
