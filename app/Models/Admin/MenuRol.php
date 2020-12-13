<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuRol extends Model
{
    protected $dateFormat = 'Y-d-m H:i:s.v';
    protected $table = 'menus_rol';
    protected $fillable = ['rol_id', 'menu_id'];// campos que se guardan en la base de datos
    protected $guarded = ['rol_id', 'menu_id'];
    public $timestamps = false;
}