<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of doctors.
     */
    public function index()
    {
        $doctors = Doctor::latest()->get();

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctor.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created doctor in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|max:30',
        ]);

        Doctor::create($validated);

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Doctor added successfully.');
    }

    /**
     * Display the specified doctor.
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified doctor.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified doctor in the database.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string|max:30',
        ]);

        $doctor->update($validated);

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified doctor from the database.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Doctor deleted successfully.');
    }
}