<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = Motor::latest()->paginate(5);

        return view('motors.index', compact('motors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'merek' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            
        ]);

        Motor::create($request->all());

        return redirect()->route('motors.index')
            ->with('success', 'Motor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Motor $motor)
    {
        return view('motors.show', compact('motor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motor $motor)
    {
        return view('motors.edit', compact('motor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'nama' => 'required',
            'merek' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
        ]);

        $motor->update($request->all());

        return redirect()->route('motors.index')
            ->with('success', 'Motor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motor $motor)
    {
        $motor->delete();

        return redirect()->route('motors.index')
            ->with('success', 'Motor deleted successfully');
    }
}