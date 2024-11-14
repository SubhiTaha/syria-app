<x-layout title="Add new city">
    <h1>Add a New City</h1>

    <form method="POST" action="/cities">
        @csrf
        <div>
            <label for="city_name">City Name:</label>
            <input type="text" id="city_name" name="city_name" />
        </div>
        <div>
            <label for="tour_site_name">Tour Site Name:</label>
            <input type="text" id="tour_site_name" name="tour_site_name" />
        </div>
        <div>
            <label for="cost">Cost:</label>
            <input type="text" id="cost" name="cost" />
        </div>
        <div>
            <button type="submit">Save the city</button>
        </div>
    </form>
</x-layout>
