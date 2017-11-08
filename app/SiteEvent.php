<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteEvent extends Model
{
    // Table name
    protected $tableName = 'site_events';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
