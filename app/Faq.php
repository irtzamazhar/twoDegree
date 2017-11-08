<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    // Table name
    protected $tableName = 'faqs';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
