@extends('admin.app')

@section('content')
<div class="container">
    <h3>Add Package</h3>
    <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="package_name">Package Name</label>
            <input type="text" name="package_name" class="form-control" value="{{ old('package_name') }}" />
            @error('package_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_of_days">No of Days</label>
            <input type="number" name="no_of_days" class="form-control" value="{{ old('no_of_days') }}" />
            @error('no_of_days')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_of_nights">No of Nights</label>
            <input type="number" name="no_of_nights" class="form-control" value="{{ old('no_of_nights') }}" />
            @error('no_of_nights')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" />
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status">Package Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
