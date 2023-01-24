<?php

namespace App\Models;

// Class can be used to 'filter' an API, to 'keep' what we want.
class Episode
{

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