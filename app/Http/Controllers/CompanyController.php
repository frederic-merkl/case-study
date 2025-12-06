<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource (Liste aller Firmen).
     */
    public function index()
    {
        $companies = Company::all();

        return view("companies.index", ["companies" => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("companies.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255|unique:companies,name",
            "description" => "required|string",
            "email" => "required|email|max:255|unique:companies,email",
            "city" => "required|string|max:100",
            "street" => "nullable|string|max:255",
            "zip_code" => "nullable|string|max:100",
            "country" => "nullable|string|max:100",
            "phone" => "nullable|string|max:100",
            "website" => "nullable|url|max:255",
            "employee_size" => "nullable|string",
        ]);

        $company = Company::create(array_merge($validated, [
            "user_id" => auth()->id(),
        ]));

        return redirect()->route("companies.show", $company);
    }

    /**
     * Display the specified resource (Detailansicht).
     */
    public function show(Company $company)
    {
        return view("companies.show", ["company" => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view("companies.edit", ["company" => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255|unique:companies,name,",
            "description" => "required|string",
            "email" => "required|email|max:255|unique:companies,email,",
            "city" => "required|string|max:100",
            "street" => "nullable|string|max:255",
            "zip_code" => "nullable|string|max:100",
            "country" => "nullable|string|max:100",
            "phone" => "nullable|string|max:100",
            "website" => "nullable|url|max:255",
            "employee_size" => "nullable|string",
        ]);

        $company->update($validated);

        return redirect()->route("companies.show", $company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route("companies.index");
    }
}