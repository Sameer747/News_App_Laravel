<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    /**
     * specify table name such that when running can get to correct db table
    */
    protected $table="languages";
}
