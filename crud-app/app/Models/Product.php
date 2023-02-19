<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Class can be used to 'filter' an API, to 'keep' what we want.
class Product extends Model
{

  protected $fillable = [
    'name',
    'price', // decimal(19, 4)
    'description',
    'item_number',
    'image', // imageURL method in Faker
  ];
} // End of class here