<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string'
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient added successfully!');
    }

    public function edit(Patient $patient)
    {
        return view('patients.form', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }
}
