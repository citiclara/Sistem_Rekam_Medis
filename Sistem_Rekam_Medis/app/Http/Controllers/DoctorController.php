<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'phone' => 'nullable|string',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully!');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.form', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'phone' => 'nullable|string',
        ]);

        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
