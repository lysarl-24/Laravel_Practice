<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        //Eloquerntn
        $movies = Movies::all();

        //dd ($movies)
        return view('movies.list', compact('movies'));


    }
}
