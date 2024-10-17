@extends('admin.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Hotel</h3>
    <form action="{{ route('admin.hotel.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="destination">Destination</label>
            <input type="text" name="destination" class="form-control" value="{{ old('destination', $hotel->destination) }}" />
            @error('destination')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location">Hotel Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $hotel->location) }}" />
            @error('location')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hotel_category_id">Hotel Category</label>
            <select name="hotel_category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('hotel_category_id', $hotel->hotel_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            @error('hotel_category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
