@extends('layouts.app')

@section('content')
                <!-- Your edit & delete button comes here.-->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Upload Blog Images
                        <a href="{{ url('blogs') }}" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
	    @endif

                    <h5>Blog Name: {{ $blog->title }}</h5>
                    <hr>

                    @if ($errors->any())
                    <ul class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form action="{{ url('blogs/'.$blog->id.'/upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Upload Images (Max:20 images only)</label>
                            <input type="file" name="images[]" multiple class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            @foreach ($blogImages as $blogImg)
                <img src="{{ asset($blogImg->image) }}" class="border p-2 m-3" style="width: 100px; height: 100px;" alt="Img" />
                <a href="{{ url('blog-image/'.$blogImg->id.'/delete') }}" >Delete</a>
            @endforeach
        </div>
    <div>
</div>
@endsection
