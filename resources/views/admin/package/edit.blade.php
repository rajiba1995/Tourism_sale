@extends('admin.app')

@section('content')
<div class="container">
    <h3>Edit Package</h3>
    <form action="{{ route('admin.package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="package_name">Package Name</label>
            <input type="text" name="package_name" value="{{ old('package_name', $package->package_name) }}" class="form-control" />
            @error('package_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_of_days">No of Days</label>
            <input type="number" name="no_of_days" value="{{ old('no_of_days', $package->no_of_days) }}" class="form-control" />
            @error('no_of_days')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_of_nights">No of Nights</label>
            <input type="number" name="no_of_nights" value="{{ old('no_of_nights', $package->no_of_nights) }}" class="form-control" />
            @error('no_of_nights')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            @if($package->image)
                <div>
                    <img src="{{ asset('storage/' . $package->image) }}" alt="Package Image" style="width: 150px; height: auto; margin-bottom: 10px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control" />
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status">Package Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status', $package->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $package->status) == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
