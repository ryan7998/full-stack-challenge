<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminMiddleware;
use App\Services\Contracts\CompanyServiceInterface;

class CompanyController extends Controller
{

    protected $companyService;


    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            AdminMiddleware::class
        ];
    }

    public function __construct(CompanyServiceInterface $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the companies.
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $companies = $this->companyService->getAllCompanies($filters);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(CompanyStoreRequest  $request)
    {
        $validated = $request->validated();

        Company::create($validated);

        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified company.
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {

        $validated = $request->validated();

        $company->update($validated);

        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(Company $company)
    {
        // $this->companyService->deleteCompany($company->id);
        // return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
        try {
            $this->companyService->deleteCompany($company->id);
            return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.companies.index')->with('error', $e->getMessage());
        }
    }
}
