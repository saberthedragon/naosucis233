<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

  public function store(Request $request)
  {

    // Form Validation done in private function ;)

    Review::create($this->validatedData($request));


    return redirect()->route('products.show', $request->product_id)->with('success', 'Comment was added successully');
  } // end of "Store"

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function destroy($review_id, Request $request)
  {

    $review = Review::findOrFail($review_id);
    $review->delete();

    return redirect()->route('products.show', $review->product_id)->with('success', 'Comment was deleted');
  } // End of "Destroy"


  // Form validation here
  private function validatedData($request)
  {
    $validatedData = $request->validate([
      // Validation rules here
      'comment' => 'required',
      'rating' => 'integer', // Make selectable 1-5
      'product_id' => 'integer|required',
    ]);
    return $validatedData;
  }
}
