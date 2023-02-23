<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $reviews = Product::with('review')->get();
    return view('reviews.index', ['reviews' => $$reviews]);
  } // End of "Index"

  public function create() // Fix "N+1" issue here?
  {
    $review = new Review();
    return view('review.create', ['review' => $review]); // Linked via "Button"
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

    Product::create($this->validatedData($request));

    return redirect()->route('products.show')->with('success', 'Comment was added successully');
  } // end of "Store"

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function destroy($id) // Fix "N+1" issue here?
  {

    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.show')->with('success', 'Comment was deleted');
  } // End of "Destroy"


  // Form validation here
  private function validatedData($request)
  {
    $validatedData = $request->validate([
      // Validation rules here
      'comment' => 'required',
      'rating' => 'integer', // Make selectable 1-5
      'product_number' => 'integer|required',
    ]);
    return $validatedData;
  }
}
