@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>
                Show Blog
                <a class="btn btn-danger float-end" href="{{ route('blogs.index') }}"> Back</a>
            </h2>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="mb-3">
                        <label>Title</label>
                        <p>{{ $blog->title }}</p>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="mb-3">
                        <label>Description</label>
                        <p>{{ $blog->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
