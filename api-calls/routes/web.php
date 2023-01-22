<?php

use Illuminate\Support\Facades\Route;
use App\Models\TvMazeAPI; // NameSpace Link for "models"

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
/*
Steps:
*  Create Class "Episode" (in "Models")
*  Capture a show query string variable and if not set default to 1 (blah)
*  Make api call to get show details, specifically the name of show (in "Models")
* Make api call to get show episodes (blah)
* Use array_map to take the raw api response of episodes and create a collection of Show objects
* Make sure you extract the data from the api responses and capture them to the properties of Show (blah)
* Display show name at top of page (blah)
* Display shows in a responsive layout using Bootstrap (needs CSS file. ;) )
*/




// Start Routes here

Route::get('/', function () {
    return view('welcome');
});

Route::get('/episodes', function () {

    $limit = intval(request()->query('limit')); // Needed (?)
    $limit = $limit < 1 ? 10 : $limit;

    $episodes = TvMazeAPI::fetch($limit);
    // $show           = isset($_GET['show']) ? $_GET['show'] : '1';    
    return view('episodes/index', ['episodes' => $episodes]); // ie: view 'episodes' --> episodes.blade.php
});
