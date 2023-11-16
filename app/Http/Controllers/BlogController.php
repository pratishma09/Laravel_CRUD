<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\fileExists;

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
            'name'=>['required','string','unique:blogs,name'],
            'description'=>'required',
            'excerpt'=>'required',
            'slug'=> 'required',
            'img'=>'required|mimes:jpg,jpeg,png'
        ]);
        $filename='';

    if($request->hasFile('img')){
        $filename=time() . '.' . $request->img->getClientOriginalExtension(); 
        $request->img->move(public_path('assets'), $filename);
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
        //this hadn't worked as enctype was not provided there
        $request->validate([
            'name'=>['required','string','unique:blogs,name'],
            'description'=>'required',
            'excerpt'=>'required',
            'slug'=> 'required',
            'img'=>'nullable|mimes:jpg,jpeg,png'
        ]);
        $blog=Blog::where('id',$id)->first();
        if(file_exists($request->img)){
            $filename=time() . '.' . $request->img->getClientOriginalExtension(); 
            $request->img->move(public_path('assets'), $filename);
            
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
