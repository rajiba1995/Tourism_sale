@extends('admin.app')

@section('title', 'Edit')

@section('content')



<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Office
                            <a href="{{ url('admin/designation') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/designation/update/'.$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $data->title }}" class="form-control" />
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $data->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$data->status ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection