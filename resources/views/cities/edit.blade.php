<x-layout title="Edit a City">
    <h1>Edit the details for {{$city->city_name}}</h1>

    <form action="/cities/{{$city->id}}" method="POST">
        @csrf
        @method('PATCH')

        <div>
            <label for="city_name">City Name:</label>
            <input type="text" id="city_name" name="city_name" value="{{$city->city_name}}" required>
        </div>

        <div>
            <label for="tour_site_name">Tour Site Name:</label>
            <input type="text" id="tour_site_name" name="tour_site_name" value="{{$city->tour_site_name}}" required>
        </div>

        <div>
            <label for="cost">Cost:</label>
            <input type="number" id="cost" name="cost" value="{{$city->cost}}" step="0.01" required>
        </div>

        <div>
            <button type="submit">Save Changes</button>
        </div>
    </form>
</x-layout>
