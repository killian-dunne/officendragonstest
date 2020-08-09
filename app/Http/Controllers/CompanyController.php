<?php

namespace App\Http\Controllers;

use App\Company;
use App\Tag;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();
        $tags = Tag::all();
        return view('index', [
            'companies' => $companies,
            'tags' => $tags
            ]);
    }

    public function create() {

    }

    public function store() {

    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }
}
