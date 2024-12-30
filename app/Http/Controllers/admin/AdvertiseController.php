<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertise=Advertise::orderBy('id','desc')->get();
        return view('admin.advertise.index',compact('advertise'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();
        $validator=Validator::make($request->all(),[
            'company_name'=>'required|string',
            'contact'=>'required',
            'banner'=>'required',
            'redirect_url'=>'required',
        ]);
        $advertise=new Advertise();
        $advertise->company_name=$request->company_name;
        $advertise->phone=$request->contact;
        $advertise->banner=$request->banner;
        $advertise->redirect_url=$request->redirect_url;
        $advertise->expire_date=$request->expire_date;
        if($request->hasFile('banner'))
        {
            $file=$request->banner;
            $newName=time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$newName);
            $advertise->banner="images/$newName";
        }
        $advertise->save();
        toast('Advertise Save successfully','success');
        return redirect()->route('advertise.index');
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
        $advertise=Advertise::find($id);
        return view('admin.advertise.edit',compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        //return $request->all();
        $validator=Validator::make($request->all(),[
            'company_name'=>'required|string',
            'contact'=>'required',
            'banner'=>'required',
            'redirect_url'=>'required',
        ]);
        $advertise=Advertise::find($id);
        $advertise->company_name=$request->company_name;
        $advertise->phone=$request->contact;
        $advertise->banner=$request->banner;
        $advertise->redirect_url=$request->redirect_url;
        $advertise->expire_date=$request->expire_date;
        if($request->hasFile('banner'))
        {
            $file=$request->banner;
            $newName=time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$newName);
            $advertise->banner="images/$newName";
        }
        $advertise->update();
        toast('Advertise update successfully','success');
        return redirect()->route('advertise.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertise=Advertise::find($id);
        $advertise->delete();
        Alert::success('success', 'Advertise delete successfully');
        return redirect()->route('advertise.index');
    }
}
