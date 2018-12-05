<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\Places;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
	public function index()
    {
        return Places::all();
    }
    public function show($id)
    {
        return Places::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $place = Places::findOrFail($id);
        $place->update($request->all());
        return $place;
    }
    public function store(Request $request)
    {
        $place = Places::create($request->all());
        return $place;
    }
    public function destroy($id)
    {
        $place = Places::findOrFail($id);
        $place->delete();
        return '';
    }
}
