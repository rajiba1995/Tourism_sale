@extends('admin.app')

@section('content')
<div class="container mt-5">
    <h3>Add Employee</h3>
    <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Employee Name</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="email">Email ID</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="designation_id">Designation</label>
            <select name="designation_id" class="form-control">
                @foreach($designations as $designation)
                    <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
