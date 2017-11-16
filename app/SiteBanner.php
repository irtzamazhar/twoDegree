<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteBanner extends Model
{
    // Table name
    protected $tableName = 'site_banners';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
