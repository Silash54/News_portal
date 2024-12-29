<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CompanyResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;

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
}
