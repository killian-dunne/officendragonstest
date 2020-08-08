<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getIndex() {
        $companies = Company::all();
        return view('index', ['companies' => $companies]);
    }
}
