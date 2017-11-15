<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Table name
    protected $tableName = 'menus';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    
    public static function header() {
        return static::where('page_place', '=', 'header')->get()->toArray();
    }
    
    public static function footer() {
        return static::where('page_place', '=', 'footer')->get()->toArray();
    }
    
}
