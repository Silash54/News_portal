<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Post::all();
        return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'categories'=>'required',
            'description'=>'required'
        ]);
        //return $request;
        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        if($request->hasFile('image'))
        {
            $file=$request->image;
            $newName=time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$newName);
            $post->image="images/$newName";
        }
        $post->save();
        $post->categories()->attach($request->categories);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        return view('admin.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //return $request;
        $request->validate([
            'title'=>'required',
            'categories'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        //return $request;
        $post= Post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        $post->status=$request->status;
        if($request->hasFile('image'))
        {
            $file=$request->image;
            $newName=time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$newName);
            $post->image="images/$newName";
        }
        $post->update();
        $post->categories()->sync($request->categories);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
       // return $post;
        $post->delete();
        return redirect()->route('post.index');
    }
}
