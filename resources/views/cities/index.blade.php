<x-layout title="List of Cities">
    <h1>Here's a list of cities</h1>

    <!-- Search Form -->
    <form method="GET" action="/cities" class="search-form">
        <input type="text" name="search" placeholder="Search for a city..." value="{{ $search }}">
        <button type="submit" class="search-button">Search</button>
    </form>

    @if($search)
    <p class="search-results">{{ $totalResults }} results found for "{{ $search }}"</p>
    @endif

    <!-- Cities Container -->
    <div class="cities-container">
        @foreach ($cities as $city)

        <div class="city-card">
            <h2>
                <a href="/cities/{{ $city->id }}" class="city-link">{{ $city->city_name }}</a>
            </h2>
            <p><strong>Tour Site:</strong> {{ $city->tour_site_name }}</p>
            @if ($city->reviews->isNotEmpty())
            <p><strong>Review:</strong> "{{ $city->reviews->first()->review_text }}"</p>
            <p><strong>Rating:</strong> {{ $city->reviews->first()->rating }}/5</p>
            @else
            <p><strong>Review:</strong> No reviews yet.</p>
            <!-- Display Hotel Name -->
            @if($city->hotels->isNotEmpty())
            <p><strong>Hotel:</strong> {{ $city->hotels->first()->hotel_name }}</p>
            @else
            <p><strong>Hotel:</strong> No hotel available</p>
            @endif
            @endif
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        {{ $cities->appends(request()->query())->links('pagination::custom') }}
    </div>
</x-layout>
