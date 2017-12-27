<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    // Table name
    protected $tableName = 'checkouts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
