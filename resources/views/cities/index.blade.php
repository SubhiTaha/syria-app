<x-layout title="List the cities">
    <h1>Here's a list of cities</h1>

    <form method="GET" action="/cities" class="search-form">
        <input
            type="text"
            name="search"
            placeholder="Search for a city..."
            value="{{ request('search') }}"
            class="search-input"
        >
        <button type="submit" class="search-button">Search</button>
    </form>

    @if ($cities->count())
    <ul class="city-list">
        @foreach ($cities as $city)
        <li class="city-item">
            <a href="/cities/{{ $city->id }}" class="city-link">
                {{ $city->city_name }}
            </a>
        </li>
        @endforeach
    </ul>

    <div class="pagination">
        {{ $cities->links() }}
    </div>
    @else
    <p class="no-cities">No cities found for your search.</p>
    @endif
</x-layout>
