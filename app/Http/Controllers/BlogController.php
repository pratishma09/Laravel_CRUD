<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::all();  //Blog from model
        return view('blogs.index',['blogs'=>$blogs]);
    }

    public function create(){
        return view("blogs.create");
    }

    public function store(Request $request){

        $request->validate([
            'name'=>['required','string'],
            'description'=>'required',
            'excerpt'=>'required',
            'slug'=> 'required',
            'img'=>'required|mimes:jpg,jpeg,gif,bmp,png'
        ]);
        $filename='';

    if($request->hasFile('img')){
        $filename=time() . '.' . $request->img->getClientOriginalExtension(); 
        $request->img->move(public_path('/assets/img'), $filename);
    }
        $blog=new Blog;
        $blog->name = $request->name;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->image = $filename;
        $blog->excerpt= $request->excerpt;
        $blog->save();
        return redirect(route('blog.index'));
    }

    public function edit($id){
        $blog=Blog::where('id',$id)->first();
        return view('blogs.edit',['blog'=>$blog]);
    }

    public function update($id, Request $request){
        $request->validate([
            'name'=>['required','string'],
            'description'=>'required',
            'excerpt'=>'required',
            'slug'=> 'required',
            'image'=>'nullable|mimes:jpg,jpeg,gif,bmp,png'
        ]);
        $blog=Blog::where('id',$id)->first();
        // dd($request);
        if(isset($request->img)){
            $filename=time() . '.' . $request->img->extension(); 
            $request->img->move(public_path('/assets/img'), $filename);
            $blog->image=$filename;
        }
       
        $blog->name = $request->name;
        $blog->slug = $request->slug;
        
        $blog->description = $request->description;
        $blog->excerpt= $request->excerpt;
        $blog->save();
        return redirect(route('blog.index'))->with('success','Product updated successfully');
    }

    public function destroy($id){
        $blog=Blog::where('id',$id)->first();
        $blog->delete();
        return redirect(route('blog.index'))->with('success','Product deleted successfully');
    }
}
