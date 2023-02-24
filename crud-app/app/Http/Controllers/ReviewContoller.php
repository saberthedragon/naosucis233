<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function create() // Fix "N+1" issue here?
  {
    $review = new Review();
    return view('reviews.reviewForm', ['review' => $review]); // Linked via "Button"
  } // end of "Create"

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {

    // Form Validation done in private function ;)

    Review::create($this->validatedData($request));

    return redirect()->route('products.show')->with('success', 'Comment was added successully');
  } // end of "Store"

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function destroy($product_id) // Fix "N+1" issue here?
  {

    $Review = Review::findOrFail($product_id);
    $Review->delete();

    return redirect()->route('products.show')->with('success', 'Comment was deleted');
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
