@extends('admin.app')

@section('title', 'Employee')

@section('content')
   

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Designation
                            <a href="{{ route('admin.employee.create') }}" class="btn btn-primary float-end">Add Designation</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->designation->title }}</td>
                                    <td>{{ $employee->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.employee.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin.employee.destroy',$employee->id) }}" class="btn btn-danger mx-2">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
