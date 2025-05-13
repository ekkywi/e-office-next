<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function showEofDivision()
    {
        $divisions = Division::withCount('users')->get();

        return view('content.eof-division', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:divisions,name',
            'tag' => 'required|string|max:10|unique:divisions,tag',
            'color' => 'required|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        Division::create([
            'name' => $request->name,
            'tag' => $request->tag,
            'color' => $request->color,
        ]);

        return redirect()->back()->with('success', 'Data Divisi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:divisions,name,' . $id,
            'tag' => 'required|string|max:10|unique:divisions,tag,' . $id,
            'color' => 'required|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        $division = Division::findOrFail($id);

        $division->update([
            'name' => $request->name,
            'tag' => $request->tag,
            'color' => $request->color,
        ]);

        return redirect()->back()->with('success', 'Data Divisi berhasil diperbarui.');
    }
}
