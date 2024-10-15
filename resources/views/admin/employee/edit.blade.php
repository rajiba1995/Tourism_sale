@extends('admin.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Employee</h3>
    <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Employee Name</label>
            <input type="text" name="name" value="{{ old('name', $employee->name) }}" class="form-control" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" class="form-control" />
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email ID</label>
            <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="designation_id">Designation</label>
            <select name="designation_id" class="form-control">
                @foreach($designations as $designation)
                    <option value="{{ $designation->id }}" {{ $employee->designation_id == $designation->id ? 'selected' : '' }}>
                        {{ $designation->title }}
                    </option>
                @endforeach
            </select>
            @error('designation_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Password (Leave blank if not changing)</label>
            <input type="password" name="password" class="form-control" />
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            @if($employee->image)
                <div>
                    <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" style="width: 150px; height: auto; margin-bottom: 10px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control" />
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $employee->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$employee->status ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
