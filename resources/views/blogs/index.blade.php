@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                Laravel Blog from scratch
                <a class="btn btn-primary float-end" href="{{ route('blogs.create') }}"> Create New Blog</a>
            </h2>
        </div>
        <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
		    <td>
		        <a href="{{ url('blogs/'.$blog->id.'/upload') }}" class="btn btn-info">Add / View Images</a>
           	    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('blogs.show',$blog->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
                        <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $blogs->links() !!}

        </div>
    </div>
@endsection
