<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of companies.
     */
    public function index()
    {
        $companies = Company::withCount('posts')->paginate(9); // Paginate for performance
        return view('frontend.companies.index', compact('companies'));
    }

    /**
     * Display the specified company.
     */
    public function show(Company $company)
    {
        $company->load('posts'); // Eager load posts
        return view('frontend.companies.show', compact('company'));
    }
}
