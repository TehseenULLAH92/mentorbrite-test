<?php

namespace App\Http\Controllers;
use App\Models\Places;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
	public function index(){
    return view('admin.places.index');
  }
	public function restaurants(){
		$restaurants = Places::All();
		// dd($restaurants);
    return view('restaurants', [ 'restaurants' => $restaurants ]);
  }
}
