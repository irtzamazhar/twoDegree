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
}
