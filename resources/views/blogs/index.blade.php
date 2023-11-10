<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Blogs Today</h1>
    <a href="{{route('blog.create')}}">Create a blog</a>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        @foreach($blogs as $blog)
        <p>{{$blog->id}}</p>
        <h3>{{$blog->name}}</h3>
        <img src="assets/img/{{$blog->image}}" class="rounded-circle" width="50" height="50">
        <p>{{$blog->excerpt}}</p>
        <p>{{$blog->description}}</p>
        <p>{{$blog->slug}}</p>
        <a href="blog/{{$blog->id}}/edit">Edit</a>
        <a href="blog/{{$blog->id}}/destroy">Delete</a>
        @endforeach
    </div>
</body>
</html>