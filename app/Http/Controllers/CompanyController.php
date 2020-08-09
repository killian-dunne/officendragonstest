<?php

namespace App\Http\Controllers;

use App\Company;
use App\Tag;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::orderBy('created_at', 'desc')->get();
        $tags = Tag::all();
        $tags = $tags->groupBy('category');
        return view('company.index', [
            'companies' => $companies,
            'tags' => $tags
            ]);
    }

    public function create() {
        return view('company.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required', 
            'description' => 'required'
        ]);
        
        $company = new Company;
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->save();
        return redirect('/')->with('success', 'Company created'); 
    }

    public function edit($id) {
        $company = Company::find($id);
        return view('company.edit')->with('company', $company);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required', 
            'description' => 'required'
        ]);
        
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->save();
        return redirect('/')->with('success', 'Company updated');
    }

    public function destroy($id) {
        $company = Company::find($id);
        $company->delete();
        return redirect('/')->with('success', 'Post Removed');
    }
}
