@extends('layout')
@section('title', 'Blogs Today')

@section('content')
    <h1>Blogs Today</h1>
    <a href="{{route('blog.create')}}">Create a blog</a>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div class="blog-list">
        @foreach($blogs as $blog)
        <p class="blog-id">{{$blog->id}}</p>
        <h3 class="blog-name">{{$blog->name}}</h3>
        <img src="assets/{{$blog->image}}" class="rounded-circle" width="50" height="50">
        <p class="blog-excerpt">{{$blog->excerpt}}</p>
        <p class="blog-description">{{$blog->description}}</p>
        <p class="blog-slug">{{$blog->slug}}</p>
        <a href="blog/{{$blog->id}}/edit" class="edit-link">Edit</a>
        <a href="blog/{{$blog->id}}/destroy" class="delete-link">Delete</a>
        @endforeach
    </div>
@endsection