@extends('admin.app')

@section('title', 'Hotels')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mt-3">
                    <div class="card-header">
                        <h4>Hotel
                            <a href="{{ route('admin.hotel.create') }}" class="btn btn-primary float-end">Add Hotel</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Destination</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotels as $hotel)
                        <tr>
                            <td>{{ $hotel->id }}</td>
                            <td>{{ $hotel->destination }}</td>
                            <td>{{ $hotel->location }}</td>
                            <td>{{ $hotel->hotelCategory->title }}</td>
                            <td>
                                <a href="{{ route('admin.hotel.edit', $hotel->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('admin.hotel.destroy', $hotel->id) }}" class="btn btn-warning">Delete</a>
                                <!-- <form action="{{ route('admin.hotel.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                    csrf
                                    method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

