<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Class can be used to 'filter' an API, to 'keep' what we want.
class Episode extends Model
{

    protected $fillable = [
        'name',
        'image',
        'season',
        'episode',
        'show_number',
        'summary'
    ];
} // End of class here