<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments.
     */
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $doctors = Doctor::orderBy('name')->get();
        $patients = Patient::orderBy('name')->get();

        return view('appointments.create', compact('doctors', 'patients'));
    }

    /**
     * Store a newly created appointment.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);

        Appointment::create($validated);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment added successfully.');
    }

    /**
     * Display the specified appointment.
     */
    public function show(Appointment $appointment)
    {
        $appointment->load(['doctor', 'patient']);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit(Appointment $appointment)
    {
        $doctors = Doctor::orderBy('name')->get();
        $patients = Patient::orderBy('name')->get();

        return view(
            'appointments.edit',
            compact('appointment', 'doctors', 'patients')
        );
    }

    /**
     * Update the specified appointment.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($validated);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified appointment.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}