<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Class can be used to 'filter' an API, to 'keep' what we want.
class Episode extends Model
{

    // TODO: Replace below with $fillable

    function __construct(
        public $name,
        public $image,
        public $season,
        public $episode, // "1" is tagged "Default" ;)
        public $summary
    ) {
        // Can do more here
    }
} // End of class here