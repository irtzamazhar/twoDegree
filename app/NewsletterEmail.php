<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterEmail extends Model
{
    // Table name
    protected $tableName = 'newsletter_emails';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
