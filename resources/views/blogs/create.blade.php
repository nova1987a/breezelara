@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>
                Add Blog 
                <a class="btn btn-danger float-end" href="{{ route('blogs.index') }}"> Back</a>
            </h2>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blogs.store') }}" method="POST">
                @csrf

                 <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" />
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
