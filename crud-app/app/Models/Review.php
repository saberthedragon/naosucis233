<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Class can be used to 'filter' an API, to 'keep' what we want.
class Review extends Model
{

  protected $fillable = [
    'comment',
    'rating',
    'product_id',
  ];


  public function product()
  {
    return $this->belongsTo(Product::class);
  } // End of "Products -> BelongsTo:Product"

  public function user()
  {
    return $this->belongsTo(User::class);
  } // End of "User -> BelongsTo:User"


} // End of class here
