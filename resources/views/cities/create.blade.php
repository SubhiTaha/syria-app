<x-layout title="Add new city">
    <h1>Add a New City</h1>

    @if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/cities">
        @csrf
        <label for="city_name">City Name:</label>
        <input type="text" id="city_name" name="city_name" value="{{ old('city_name') }}">

        <label for="tour_site_name">Tour Site Name:</label>
        <input type="text" id="tour_site_name" name="tour_site_name" value="{{ old('tour_site_name') }}">

        <label for="cost">Cost:</label>
        <input type="number" id="cost" name="cost" value="{{ old('cost') }}" step="0.01">

        <!-- New Fields for Rating and Review -->
        <label for="rating">Star Rating (1-5):</label>
        <input type="number" id="rating" name="rating" value="{{ old('rating') }}" min="1" max="5" step="1">

        <label for="review_text">Review Text:</label>
        <textarea id="review_text" name="review_text" rows="3">{{ old('review_text') }}</textarea>

        <h2>Hotel Details</h2>

        <label for="hotel_name">Hotel Name:</label>
        <input type="text" id="hotel_name" name="hotels[0][hotel_name]" placeholder="Hotel Name" required>

        <label for="hotel_number">Hotel Number:</label>
        <input type="text" id="hotel_number" name="hotels[0][hotel_number]" placeholder="Hotel Number" required>

        <button type="submit">Add City</button>
    </form>
</x-layout>
