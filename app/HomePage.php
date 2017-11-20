<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    // Table name
    protected $tableName = 'home_pages';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
