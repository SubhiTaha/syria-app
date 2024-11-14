<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    function index(Request $request)
    {
        $search = $request->input('search');

        $cities = City::when($search, function ($query, $search) {
            $query->where('city_name', 'like', "%{$search}%");
        })->simplePaginate(5)->appends(['search' => $search]);

        return view('cities.index', ['cities' => $cities]);
    }

    function create()
    {
        return view('cities.create');
    }

    function about()
    {
        return view('cities.about');
    }

    function store(Request $request)
    {
        $city = new City();
        $city->city_name = $request->city_name;
        $city->tour_site_name = $request->tour_site_name;
        $city->cost = $request->cost;
        $city->save();
        return redirect('/cities');
    }

    function show($id)
    {
        $city = City::find($id);
        return view('cities.show', ['city' => $city]);
    }

    function edit($id)
    {
        $city = City::find($id);
        return view('cities.edit', ['city' => $city]);
    }

    function update(Request $request, $id)
    {
        $validated = $request->validate([
            'city_name' => 'required|string|max:10',
            'tour_site_name' => 'required|string|max:10',
            'cost' => 'required|numeric|min:1',
        ]);

        $city = City::findOrFail($id);

        $city->city_name = $validated['city_name'];
        $city->tour_site_name = $validated['tour_site_name'];
        $city->cost = $validated['cost'];

        $city->save();

        return redirect('/cities');
    }
    function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect('/cities');
    }
}
