<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Post::orderBy('id','asc')->where('status','approved')->get();
        //return $post;
        return PostResource::collection($post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return response()->json([
            'status'=>true,
            'message'=>'Post create successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
