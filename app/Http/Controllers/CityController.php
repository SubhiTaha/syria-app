<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $cities = City::with(['reviews', 'hotels'])
            ->when($search, function ($query, $search) {
                $query->where('city_name', 'like', "%{$search}%");
            })
            ->paginate(5);

        $totalResults = $cities->total();

        return view('cities.index', [
            'cities' => $cities,
            'search' => $search,
            'totalResults' => $totalResults,
        ]);
    }

    function create()
    {
        return view('cities.create');
    }

    function about()
    {
        return view('cities.about');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'city_name' => 'required|string|max:255',
            'tour_site_name' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
            'hotels.*.hotel_name' => 'required|string|max:255',
            'hotels.*.hotel_number' => 'required|string|max:255',
        ]);

        // Create the city record
        $city = City::create([
            'city_name' => $validated['city_name'],
            'tour_site_name' => $validated['tour_site_name'],
            'cost' => $validated['cost'],
        ]);

        // Create the review for the city
        $city->reviews()->create([
            'rating' => $validated['rating'],
            'review_text' => $validated['review_text'],
        ]);

        // Create the hotels for the city
        if (!empty($validated['hotels'])) {
            foreach ($validated['hotels'] as $hotelData) {
                $city->hotels()->create($hotelData);
            }
        }

        return redirect('/cities')->with('success', 'City added successfully!');
    }


    public function show($id)
    {
        $city = City::with('hotels','reviews')->findOrFail($id);
        return view('cities.show', ['city' => $city]);
    }

    function edit($id)
    {
        $city = City::find($id);
        return view('cities.edit', ['city' => $city]);
    }

    function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'city_name' => 'required|string|max:255',
            'tour_site_name' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:1|max:5',
            'review_text' => 'nullable|string|max:1000',
            'hotels.*.hotel_name' => 'required|string|max:255',
            'hotels.*.hotel_number' => 'required|string|max:255',
        ]);

        // Update the city details
        $city->update([
            'city_name' => $validated['city_name'],
            'tour_site_name' => $validated['tour_site_name'],
            'cost' => $validated['cost'],
        ]);

        // Update or create the first review for the city
        $city->reviews()->updateOrCreate(
            ['id' => $city->reviews->first()->id ?? null], // Find the first review if it exists
            [
                'rating' => $validated['rating'],
                'review_text' => $validated['review_text'],
            ]
        );
        // Process hotels
        if (!empty($validated['hotels'])) {
            foreach ($validated['hotels'] as $hotelId => $hotelData) {
                $city->hotels()->updateOrCreate(
                    ['id' => $hotelId],
                    [
                        'hotel_name' => $hotelData['hotel_name'],
                        'hotel_number' => $hotelData['hotel_number'],
                    ]
                );
            }
        }
        return redirect()->route('cities.show', $city)->with('success', 'City, reviews, and hotels updated successfully.');

    }


    function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect('/cities');
    }
}
