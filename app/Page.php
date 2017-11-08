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
}
