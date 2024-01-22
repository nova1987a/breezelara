@extends('layouts.app')

@section('content')
<div class="container">
    <!--@if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
	@auth
	    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
    @else
    	<a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
    	@if (Route::has('register'))
 	    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
	@endif
	@endauth
    </div>
    @endif-->
    <!--div class="row justify-content-center">
        <div class="col-md-10"-->

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
				    <img src="{{ asset($blogImg->image) }}" class="border p-2 m-3" style="width: 200px; height: 200px;">
				</a>
			   </div>
		    @endif
		@endforeach 
		</div>
   	    </div>
	    @endforeach
        </div>
    <!--/div>
</div-->
@endsection
