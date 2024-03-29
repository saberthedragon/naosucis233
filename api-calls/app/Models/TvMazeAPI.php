<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;



class TvMazeAPI
{
    public static function fetch($showNumber)
    {

        $contentDetails = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        $episodeCollections = collect($contentDetails);


        // Restructuring of "Episode Info" here



        // return $episodeCollections->map(function ($input) {

        return $episodeCollections->map(function ($input) use ($showNumber) {
            $image = isset($input['image']['medium']) ? $input['image']['medium'] : "";


            // -->> FirstOrCreate == Checks IF it exists. If not, create the item. ;) <<--

            return Episode::firstOrCreate(['name' => $input['name'], 'image' => $image, 'season' => $input['season'], 'episode' => $input['number'], 'show_number' => $showNumber, 'summary' => strip_tags($input['summary'])]);
        }, $episodeCollections);
    }
};

// new Episode($input['name'], $image, $input['season'], $input['number'], $input['summary']); --> My list above

// // Crude, NOT "Professional" method for APIs ;)

// // Setting the default
// $show           = isset($_GET['show']) ? $_GET['show'] : '1';

// // Variables

// $contentName    = file_get_contents("https://api.tvmaze.com/shows/$show"); // Show Name; Note: Is of type "String"
// $contentDetails = file_get_contents("https://api.tvmaze.com/shows/$show/episodes"); // Episode info

// $outputName     = json_decode($contentName); // Decodes the info, & converts it into "array object" xD
// $outputDetails  = json_decode($contentDetails);


// // Restructuring of "Episode Info" here

// $shows          = array_map(function ($input) {
//     $image = isset($input->image->medium) ? $input->image->medium : "";
//     return new Show($input->name, $input->image->medium, $input->season, $input->number, $input->summary);
// }, $outputDetails);
