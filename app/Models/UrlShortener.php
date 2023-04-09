<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
    protected $table = 'urls_shortener';
    protected $fillable = ['url', 'short_link'];
}
