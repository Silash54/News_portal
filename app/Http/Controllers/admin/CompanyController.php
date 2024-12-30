<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all();
        //return $company;
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = Company::count();
        if ($company) {
            return redirect()->route('company.index');
        } else {
            return view('admin.company.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|integer',
            'tel' => 'required|integer',
            'logo' => 'required'
        ]);
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->tel = $request->tel;
        $company->facebook = $request->facebook;
        $company->youtube = $request->youtube;
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $newName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $newName);
            $company->logo = "images/$newName";
        }
        $company->save();
        toast('Company Save successfully', 'success');
        return redirect()->route('company.index');
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
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|integer',
            'tel' => 'required|integer',
            'logo' => 'required'
        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->tel = $request->tel;
        $company->facebook = $request->facebook;
        $company->youtube = $request->youtube;
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $newName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $newName);
            $company->logo = "images/$newName";
        }
        $company->update();
        toast('Company update successfully', 'success');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        //return $company;
        $company->delete();
        Alert::success('success', 'Company delete successfully');
        return redirect()->route('company.index');
    }
}
