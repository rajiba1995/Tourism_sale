@extends('admin.app')

@section('title', 'Dashboard')

@section('content')
   

<div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Destination
                            <a href="{{ route('admin.destination.create') }}" class="btn btn-primary float-end">Add Destination</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index=> $item)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    @if($item->status == 1)
                                    <td>Active</td>
                                    @else
                                    <td>Inactive</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.destination.edit',$item->id) }}" class="btn btn-success">Edit</a>

                                        <a href="{{ route('admin.destination.destroy',$item->id) }}" class="btn btn-danger mx-2">Delete</a>
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
