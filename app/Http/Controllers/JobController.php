<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  // creates query builder.
        $jobs = Job::query();
        // modifies db-query based on query string; only supportet parameter affect the db-query; implicit validation.
        if ($request->query('status') === 'aktiv') {
            $jobs->where('is_active', true);
        } else if ($request->query('status') === 'inaktiv') {
            $jobs->where('is_active', false);
        }
        // db query
        $jobs = $jobs->get();
        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $categories = Category::all();

        return view("jobs.create", [
            "companies" => $companies,
            "categories" => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * TODO use request classes
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "company_id" => "required|exists:companies,id",
            "description" => "nullable|string", // text DB type - string without max for validation
            "contact_email" => "required|email|max:255",
            "min_salary" => "nullable|string|max:20",
            "max_salary" => "nullable|string|max:20",
            "location" => "nullable|string|max:100",
            "contact_name" => "nullable|string|max:100",
            "contact_phone" => "nullable|string|max:100",
            "website" => "nullable|string|max:255",
            "tags" => "nullable|string|max:255",
            "category_ids" => "required|array|min:1",
        ]);

        // 'use' to import parent scope into local scope
        //  DB::transaction to rollback data if something goes wrong between two DB operations -> auto rollback
        //  arriay_merge to merge user input and server generated input
        return DB::transaction(function () use ($request, $validated) {
            $job = Job::create(array_merge($validated, [
                "tags" => $request->input("tags"),
                "is_active" => $request->boolean("is_active"),
                "user_id" => auth()->id() // connects job with user id -> TODO check what does auth() under the hood
            ]));

            $job->categories()->sync($request->input("category_ids"));

            return redirect()->route("jobs.show", $job)->with('success', 'Job erfolgreich erstellt');

        });

    }


    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view("jobs.show", ["job" => $job]);
    }
    /**
     * Show the form for editing the specified resource.
     * uses route-model-binding
     */

    public function edit(Job $job)
    {
        $companies = Company::all();
        $categories = Category::all();

        $currentCompany = $job->company->id;
        $currentCategoryIds = $job->categories->pluck("id")->toArray();

        return view("jobs.edit", [
            "job" => $job,
            "companies" => $companies,
            "categories" => $categories,
            "currentCompany" => $currentCompany,
            "currentCategoryIds" => $currentCategoryIds
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "company_id" => "required|exists:companies,id",
            "description" => "required|string",
            "contact_email" => "required|email|max:255",
            "min_salary" => "nullable|string",
            "max_salary" => "nullable|string",
            "location" => "nullable|string|max:100",
            "contact_name" => "nullable|string|max:100",
            "contact_phone" => "nullable|string|max:100",
            "website" => "nullable|string|max:255",
            "tags" => "nullable|string|max:255",
            "category_ids" => "required|array|min:1",
        ]);
        return DB::transaction(function () use ($validated, $request, $job) {
            $job->update(array_merge($validated, [
                "is_active" => $request->boolean("is_active"),
            ]));

            $job->categories()->sync($request->input("category_ids"));

            return redirect()->route("jobs.show", $job)->with('success', 'Aktualiserung erfolgreich');
        });


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route("jobs.index");
    }
}
