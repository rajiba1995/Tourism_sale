@extends('admin.app')

@section('content')
<div class="container">
    <h3>Package List</h3>
    <a href="{{ route('admin.package.create') }}" class="btn btn-primary">Add Package</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>No of Days</th>
                <th>No of Nights</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
                <tr>
                    <td>{{ $package->package_name }}</td>
                    <td>{{ $package->no_of_days }}</td>
                    <td>{{ $package->no_of_nights }}</td>
                    <td>{{ $package->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.package.edit', $package->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
