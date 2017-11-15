<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // Table name
    protected $tableName = 'pages';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    
//    public static function footer() {
//        return static::all();
//    }
    
//    public function menuValues()
//    {
//        return $this->oneToMany('App\Page');
//    }
}
