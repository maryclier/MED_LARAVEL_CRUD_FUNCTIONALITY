<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of patients.
     */
    public function index()
    {
        $patients = Patient::latest()->get();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new patient.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created patient.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
            'gender' => 'required|string|max:50',
            'email' => 'nullable|email|unique:patients,email',
            'phone' => 'required|string|max:30',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient added successfully.');
    }

    /**
     * Display the specified patient.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified patient.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified patient.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
            'gender' => 'required|string|max:50',
            'email' => 'nullable|email|unique:patients,email,' . $patient->id,
            'phone' => 'required|string|max:30',
        ]);

        $patient->update($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified patient.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}