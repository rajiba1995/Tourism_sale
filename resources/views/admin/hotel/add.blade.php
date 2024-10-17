@extends('admin.app')

@section('title', 'Add Hotel')

@section('content')
<div class="container mt-5">
    <h3>Add Hotel</h3>
    <form action="{{ route('admin.hotel.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="destination">Destination</label>
            <input type="text" name="destination" class="form-control" value="{{ old('destination') }}" />
            @error('destination')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}" />
            @error('location')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hotel_category_id">Hotel Category</label>
            <select name="hotel_category_id" class="form-control" required>
                @foreach($hotelCategories as $category)
                    <option value="{{ $category->id }}" {{ old('hotel_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            @error('hotel_category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
