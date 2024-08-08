<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Perform a basic search query
        $companyArr = Company::where('company_name', 'like', "%{$search}%")
                     ->orWhere('mobile', 'like', "%{$search}%")
                     ->orWhere('city', 'like', "%{$search}%")
                     ->paginate(10);

        // Pass the search term to the view to retain it in the search box
        return view('company.company', compact(['companyArr','search'])); // Pass data to view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'status' => 'required|string|max:50',
            'mobile' => 'required|string|max:20',
            'file_path' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'business_type' => 'nullable|array', // Ensure it is validated as an array
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Initialize file path as null
        $filePath = null;

        // Handle the file upload
        if ($request->hasFile('file_path')) {
            // Get the uploaded file
            $file = $request->file('file_path');

            // Generate a unique filename with the original extension
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store the file in the 'public' disk (which stores in 'storage/app/public')
            $filePath  = $file->storeAs('uploads', $filename, 'public');
        }
        
        Company::create([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'status' => $request->status,
            'mobile' => $request->mobile,
            'filename' => $filename ?? null, // Store filename if available
            'file_path' => $filePath,        // Store the file path
            'business_type' => $request->business_type,
            'city' => $request->city,
            'state' => $request->state,
            'address' => $request->address,
            'description' => $request->description
        ]);

        return redirect()->route('company.index')->withSuccess('Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company , $id)
    {
        $company = Company::find($id);
        return view('company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company,$id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'status' => 'required|string|max:50',
            'mobile' => 'required|string|max:20',
            'file_path' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'business_type' => 'nullable|array', // Ensure it is validated as an array
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Initialize file path as null
        $filePath = null;

        // Handle the file upload
        if ($request->hasFile('file_path')) {
            // Get the uploaded file
            $file = $request->file('file_path');

            // Generate a unique filename with the original extension
            $filename = time() . '_' . $file->getClientOriginalName();

            if (file_exists($filename)) {
                // Delete the file
                unlink($filename);
            }
            // Store the file in the 'public' disk (which stores in 'storage/app/public')
            $filePath  = $file->storeAs('uploads', $filename, 'public');
            
        }

        $company = Company::find($id);
        $input = ['company_name' => $request->company_name,
                  'company_email' => $request->company_email,
                  'status' => $request->status,
                  'mobile' => $request->mobile,
                  'filename' => $filename ?? null,
                  'file_path' => $filePath,
                  'business_type' => $request->business_type, // Handle array conversion
                  'city' => $request->city,
                  'state' => $request->state,
                  'address' => $request->address,
                  'description' => $request->description
                ];

                
        $company->update($input);

        return redirect()->route('company.index')->withSuccess('Company Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Company::where('id', $id)->delete();
        // Return a response
        return response()->json(['success' => true]);
    }
}
