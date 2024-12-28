<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $categories=Category::orderBy('id','desc')->get();
        $company=Company::first();
        View::share([
            'categories'=>$categories,
            'company'=>$company
        ]);
    }
    public function home()
    {
        return view('frontend.home');
    }
}
