<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CompanyResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ApiController extends Controller
{
    public function Categories()
    {
        $categories = Category::orderBy('position', 'asc')->get();
        return CategoryResource::collection($categories);
    }
    public function company()
    {
        $company=Company::first();
        //return $company;
        return new CompanyResource($company);
    }
    public function trending_posts()
    {
        $trending_posts=Post::orderBy('views','desc')->where('status','approved')->take(8)->get();
        return $trending_posts;
    }
    public function category($slug)
    {
        $category=Category::where('slug',$slug)->first();
        return new CategoryResource($category);
    }
    public function create_Category(Request $request)
    {
        //return $request;
        $validator=Validator::make($request->all(),[
            'english_title'=>'required',
            'nepali_title'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors()
            ]);
        }
        $totalCategory=Category::count();
        $category=new Category();
        $category->nepali_title=$request->nepali_title;
        $category->english_title=$request->english_title;
        $category->slug=Str::slug($request->english_title);
        $category->position=$totalCategory+1;
        $category->save();
        return response()->json([
            'status'=>true,
            'message'=>'Category Create successfully',
            'data'=>$category
        ]);
    }
}
