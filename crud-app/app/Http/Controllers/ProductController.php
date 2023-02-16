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
        $product = new \App\Models\Product;
        return view('products.create', ['product' => $product]); // Linked via "Button"
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

        \App\Models\Product::create($this->validatedData($request));

        return redirect()->route('products.index')->with('success', 'Product was added successully');
    } // end of "Store"

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $product = \App\Models\Product::findOrFail($id);
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

        $product =  \App\Models\Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
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

        // Form Validation done in private function ;)

        \App\Models\Product::findOrFail($id)->update($this->validatedData($request));

        return redirect()->route('products.index')->with('success', 'Product was updated successully');
    } // end of "Update"

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $product = \App\Models\Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product was deleted');
    } // End of "Destroy"


    // Form validation here
    private function validatedData($request)
    {
        $validatedData = $request->validate([
            // Validation rules here
            'name' => 'required',
            'price' => 'decimal:19,4', // decimal(19, 4)
            'discription' => 'required',
            'item_number' => 'ineger',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048', // SimageURL method in Faker'; Skipped in Seeding atm
        ]);
    }
}