<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class CrudUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->user()->cannot('view', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have access to this Page. Please sign in as an Admin.');
        };


        $users = User::with('reviews');

        return view('users.index', ['users' => $users->paginate(10)]);


        // Above piece converts the commented block, for our "Web.php Routing"

        // Route::get('/users', function () {
        //     $users = App / user::all();
        //     return view('users', ['users' => $users]);
        // });

    } // End of "Index"

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        if ($request->user()->cannot('view', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have access to this Page. Please sign in as an Admin.');
        };

        $user = new User;

        return view('users.create', ['user' => $user]); // Linked via "Button"




    } // end of "Create"

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        // Form Validation done in private function ;)]

        $tempUser = $this->validatedData($request);

        $password = $tempUser['password']; // get the value of password field


        $hashed = Hash::make($password); // encrypt the password

        $tempUser['password'] = $hashed;


        User::create($tempUser);




        return redirect()->route('users.index')->with('success', 'user was added successully');
    } // end of "Store"

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $user = user::with('reviews')->findOrFail($id);


        return view('users.show', ['user' => $user]);
    } // End of "Show"

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $user =  User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
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

        user::findOrFail($id)->update($this->validatedData($request));

        return redirect()->route('users.index')->with('success', 'user was updated successully');
    } // end of "Update"

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $user = user::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'user was deleted');
    } // End of "Destroy"


    // Form validation here
    private function validatedData($request)
    {
        $validatedData = $request->validate([
            // Validation rules here
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        return $validatedData;
    }
}
