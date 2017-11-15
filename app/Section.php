<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // Table name
    protected $tableName = 'sections';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    
    public static function sidebar() {
        return static::all();
    }
}
