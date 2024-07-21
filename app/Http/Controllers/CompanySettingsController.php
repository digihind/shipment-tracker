<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanySettingsController extends Controller
{
    public function edit()
    {
        $company = auth()->user()->company;
        return view('company.settings', compact('company'));
    }

    public function update(Request $request)
    {
        $company = auth()->user()->company;

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'website' => 'nullable|url',
        ]);

        $company->update($validated);

        return redirect()->route('company.settings')->with('success', 'Company information updated successfully.');
    }

    public function updateTrackingPage(Request $request)
    {
        $company = auth()->user()->company;

        $validated = $request->validate([
            'logo' => 'nullable|image|max:2048',
            'primary_color' => 'nullable|regex:/^#[a-fA-F0-9]{6}$/',
            'custom_message' => 'nullable',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('company_logos', 'public');
            $validated['logo'] = $logoPath;
        }

        $company->update($validated);

        return redirect()->route('company.settings')->with('success', 'Tracking page customization updated successfully.');
    }
}
