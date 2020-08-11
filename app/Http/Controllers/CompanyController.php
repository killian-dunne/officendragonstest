<?php

namespace App\Http\Controllers;

use App\Company;
use App\Tag;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function home() {
        return view('company.index');
    }

    public function index() {
        $companies = Company::orderBy('created_at', 'desc')->get();
        return $companies;
    }

    public function tags() {
        $tags = Tag::orderBy('id', 'asc')->get();
        $tags = $tags->groupBy('category');
        return $tags;
    }

    public function company_tags() {
        $companies = Company::all();
        $arr = array();
        foreach($companies as $company) {
            $arr[$company->id] = $company->tags;
        }
        return $arr;
    }

    public function update_tags(Request $request, $id) {
        $company = Company::find($id);
        $tag_ids = $request->get('tags');
        $company->tags()->sync($tag_ids);
        $company->save();
        return view('company.index');
    }

    public function create() {
        return view('company.form')->with('new', 'new');
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
        return $company;
    }

    public function edit($id) {
        $company = Company::find($id);
        return view('company.form')->with('company', $company);
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
        return redirect('/');
    }

    public function destroy($id) {
        $company = Company::find($id);
        $company->delete();
        return redirect('/');
    }
}
