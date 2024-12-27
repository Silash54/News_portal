<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::orderBy('position','desc')->get();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $validator=Validator::make($request->all(),[
            'english_title'=>'required',
            'nepali_title'=>'required'
        ]);
        $totalCategory=Category::count();
        $category=new Category();
        $category->nepali_title=$request->nepali_title;
        $category->english_title=$request->english_title;
        $category->slug=Str::slug($request->english_title);
        $category->position=$totalCategory+1;
        $category->save();
        return redirect()->route('category.create');
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
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator=Validator::make($request->all(),[
            'english_title'=>'required',
            'nepali_title'=>'required'
        ]);
        $totalCategory=Category::count();
        $category=new Category();
        $category->nepali_title=$request->nepali_title;
        $category->english_title=$request->english_title;
        $category->slug=Str::slug($request->english_title);
        $category->position=$totalCategory+1;
        $category->update();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        //return $category;
        $category->delete();
        return redirect()->route('category.index');
    }
}
