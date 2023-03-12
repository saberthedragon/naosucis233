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
        // $sortBy = $request->query('sortBy') ??  'rating';
        // $direction = $request->query('direction') ?? 'asc';

        // // Eager loading here
        // $products = Product::with('review')->orderBy($sortBy, $direction);

        $products = Product::with('reviews');

        return view('products.index', ['products' => $products->paginate(10)]);


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

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have access to this Page. Please sign in as an Admin.');
        };

        $product = new Product;
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

        Product::create($this->validatedData($request));

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

        $product = Product::with('reviews')->findOrFail($id);


        return view('products.show', ['product' => $product]);
    } // End of "Show"

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id, Request $request)
    {
        if ($request->user()->cannot('edit', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have access to this Page. Please sign in as an Admin.');
        };

        $product =  Product::findOrFail($id);
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

        if ($request->user()->cannot('update', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have access to this Page. Please sign in as an Admin.');
        };

        Product::findOrFail($id)->update($this->validatedData($request));

        return redirect()->route('products.index')->with('success', 'Product was updated successully');
    } // end of "Update"

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id, Request $request)
    {

        if ($request->user()->cannot('delete', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have access to this Page. Please sign in as an Admin.');
        };

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product was deleted');
    } // End of "Destroy"


    // Form validation here
    private function validatedData($request)
    {
        $validatedData = $request->validate([
            // Validation rules here
            'name' => 'required',
            'price' => 'decimal:2', // decimal(19, 4)
            'description' => 'required',
            'item_number' => 'integer|required',
        ]);
        return $validatedData;
    }
}
