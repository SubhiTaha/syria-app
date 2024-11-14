<x-layout title="Show the details for a city">
    <h1>{{$city->city_name}}</h1>
    <p>City Name: {{$city->city_name}}</p>
    <p>Tour Site Name: {{$city->tour_site_name}}</p>
    <p>Cost: {{$city->cost}}</p>

    <a href='/cities/{{$city->id}}/edit'>
        <button>Edit</button>
    </a>

    <form method="POST" action="/cities/{{ $city->id }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

</x-layout>
