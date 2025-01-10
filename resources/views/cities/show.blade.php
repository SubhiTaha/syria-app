<x-layout title="City Details">
    <div class="city-details-container">
        <h1>{{ $city->city_name }}</h1>

        <p><strong>Tour Site:</strong> {{ $city->tour_site_name }}</p>
        <p><strong>Cost:</strong> ${{ $city->cost }}</p>

        <h2>Reviews:</h2>
        @if ($city->reviews->isEmpty())
        <p>No reviews available for this city.</p>
        @else
        <ul class="reviews-list">
            @foreach ($city->reviews as $review)
            <li>
                <strong>Rating:</strong> {{ $review->rating }}/5
                <p>"{{ $review->review_text }}"</p>
            </li>
            @endforeach
        </ul>
        @endif

        <h2>Hotel Information:</h2>
        @if ($city->hotels->isNotEmpty())
        <p><strong>Hotel Name:</strong> {{ $city->hotels->first()->hotel_name }}</p>
        <p><strong>Hotel Number:</strong> {{ $city->hotels->first()->hotel_number }}</p>
        @else
        <p>No hotel information available.</p>
        @endif

        <!-- Move the edit and delete buttons here -->
        <div class="action-buttons">
            <a href="/cities/{{ $city->id }}/edit" class="edit-button">Edit</a>

            <form method="POST" action="/cities/{{ $city->id }}" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Delete</button>
            </form>
        </div>
    </div>
</x-layout>
