@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

	    @foreach($blogs as $blog)
	    <div class="card px-2 my-3 py-2">
		<h2 class="card-title">{{ $blog->title }}</h2>
		<h6 class="card-subtitle text-muted">ID: {{ $blog->id }}</h6>
		<p>{{ $blog->description }}</p>
		<div class="row row-cols-3">
		@foreach($blogImgs as $blogImg)
		    @if($blogImg->blog_id == $blog->id)
			    <div class="col">
				<a href="{{ asset($blogImg->image) }}" >
				    <img src="{{ asset($blogImg->image) }}" class="border p-2 m-1" style="width: 200px; height: 200px;">
				</a>
			    </div>
		    @endif
		@endforeach 
		</div>
   	    </div>
	    @endforeach
        </div>
    </div>
</div>
@endsection
