<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a blog post.</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$errors}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="form-label">Photo</label>
            <input type="file" name="img" class="form-control" placeholder="Blog Image">
        </div>
        <div>
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Title">
        </div>
        <div>
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">Description</textarea>
        </div>
        <div>
        <label class="form-label">Excerpt</label>
        <input type="text" name="excerpt" class="form-control" placeholder="Excerpt">
        </div>
        <div>
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" placeholder="Slug">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
</body>
</html>