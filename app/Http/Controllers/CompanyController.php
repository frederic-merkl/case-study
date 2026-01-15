<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Job;
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
    public function store(StoreJobRequest $storeJobRequest)
    {
        $validated = $storeJobRequest->validated();

        $company = Company::create(array_merge($validated, [
            "user_id" => auth()->id(),
        ]));

        return redirect()->route("companies.show", $company)->with('success', 'Firma erfolgreich erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $jobs = $company->jobs; // get all jobs from that company through realtionships -> dynamic property: alternative jobs() for more detaile queries
        return view("companies.show", ["company" => $company, "jobs" => $jobs]);
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
    public function update(UpdateCompanyRequest $updateCompanyRequest, Company $company)
    {
        $validated = $updateCompanyRequest->validated();

        $company->update($validated);

        return redirect()->route("companies.show", $company)->with('success', 'Firma erfolgreich aktualisiert!');
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