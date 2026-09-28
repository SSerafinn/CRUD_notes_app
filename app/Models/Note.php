<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // Fields that may be filled from user input
    protected $fillable = ['title', 'body'];
}
