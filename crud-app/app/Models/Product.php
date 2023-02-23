<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Class can be used to 'filter' an API, to 'keep' what we want.
class Product extends Model
{

  protected $fillable = [
    'name',
    'price', // decimal(19, 2)
    'description',
    'item_number',
    'image', // imageURL method in Faker
  ];

  public function review()
  {
    return $this->hasMany(Review::class); // Resume "Table Demo" lecture @ 22:07
  }
} // End of class here
