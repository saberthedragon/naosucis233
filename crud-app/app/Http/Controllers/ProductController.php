<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = \App\Models\Product::all();
        return view('products.index', ['products' => $products]);


        // Above piece converts the commented block, for our "Web.php Routing"

        // Route::get('/products', function () {
        //     $products = App / Product::all();
        //     return view('products', ['products' => $products]);
        // });

    } // End of "Index"

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('products.create'); // Linked via "Button"
    } // end of "Create"

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        // Form Validation here
        $validatedData = $request->validate([
            // Validation rules here
            'name' => 'required',
            'price' => 'decimal', // decimal(19, 4)
            'discription' => 'required',
            'item_number' => 'ineger', // Resume lecture @ 22:58
            'image', // imageURL method in Faker'
        ]);
    } // end of "Store"

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $product = \App\Models\Product::find($id);
        return view('products.show', ['product' => $product]);
    } // End of "Show"

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        //blah

    } // end of "Edit"

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        // blah

    } // end of "Upate"

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        // blah

    } // End of "Destroy"
}
