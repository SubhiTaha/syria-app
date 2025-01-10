<x-layout title="Edit City">
    <h1>Edit City</h1>

    @if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/cities/{{ $city->id }}">
        @csrf
        @method('PUT')

        <!-- City Name -->
        <label for="city_name">City Name:</label>
        <input type="text" id="city_name" name="city_name" value="{{ old('city_name', $city->city_name) }}" required>
        @error('city_name')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Tour Site Name -->
        <label for="tour_site_name">Tour Site Name:</label>
        <input type="text" id="tour_site_name" name="tour_site_name" value="{{ old('tour_site_name', $city->tour_site_name) }}" required>
        @error('tour_site_name')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Cost -->
        <label for="cost">Cost:</label>
        <input type="number" id="cost" name="cost" value="{{ old('cost', $city->cost) }}" step="0.01" required>
        @error('cost')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Rating Star -->
        <label for="rating">Rating (Stars):</label>
        <input type="number" id="rating" name="rating" value="{{ old('rating', $city->reviews->first()->rating ?? '') }}" min="1" max="5" step="1" required>
        @error('rating')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Rating Text -->
        <label for="review_text">Review Text:</label>
        <textarea id="review_text" name="review_text" rows="4">{{ old('review_text', $city->reviews->first()->review_text ?? '') }}</textarea>
        @error('review_text')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Hotel Information -->
        <h2>Hotel Information</h2>
        @if ($city->hotels->isNotEmpty())
        @foreach ($city->hotels as $index => $hotel)
        <div class="hotel-section">
            <label for="hotel_name_{{ $index }}">Hotel Name:</label>
            <input type="text" id="hotel_name_{{ $index }}" name="hotels[{{ $hotel->id }}][hotel_name]" value="{{ old("hotels.$hotel->id.hotel_name", $hotel->hotel_name) }}" required>

            <label for="hotel_number_{{ $index }}">Hotel Number:</label>
            <input type="text" id="hotel_number_{{ $index }}" name="hotels[{{ $hotel->id }}][hotel_number]" value="{{ old("hotels.$hotel->id.hotel_number", $hotel->hotel_number) }}" required>
        </div>
        @endforeach
        @else
        <!-- Empty Input Fields for New Hotel -->
        <div class="hotel-section">
            <label for="hotel_name_new">Hotel Name:</label>
            <input type="text" id="hotel_name_new" name="hotels[new][hotel_name]" value="{{ old('hotels.new.hotel_name') }}" required>

            <label for="hotel_number_new">Hotel Number:</label>
            <input type="text" id="hotel_number_new" name="hotels[new][hotel_number]" value="{{ old('hotels.new.hotel_number') }}" required>
        </div>
        @endif

        <button type="submit">Update City</button>
    </form>
</x-layout>
