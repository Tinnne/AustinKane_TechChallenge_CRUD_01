<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        "country",
        "slug",
        "continent",
        "capital",
        "population"
    ];
    use HasFactory;
}
