<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Edit the blog post.</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$errors}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="update">
        @csrf
        @method('put')
        <div>
            <label class="form-label">Photo</label>
            <input type="file" name="img" class="form-control" placeholder="Blog Image" value={{$blog->image}}>
        </div>
        <div>
        <label>Name</label>
        <input type="text" name="name" value="{{$blog->name}}">
        </div>
        <div>
        <label>Description</label>
        <textarea name="description">{{$blog->description}}</textarea>
        </div>
        <div>
        <label>Excerpt</label>
        <input type="text" name="excerpt" value="{{$blog->excerpt}}">
        </div>
        <div>
        <label>Slug</label>
        <input type="text" name="slug" value="{{$blog->slug}}">
        </div>
        <button type="submit">Update</button>
        
    </form>
</body>
</html>