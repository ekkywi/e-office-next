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

        return redirect()->back()->with('success', 'Berhasil menambahkan data divisi.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:divisions,id',
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'color' => 'required|string|max:7',
        ]);

        try {
            $division = Division::findOrFail($request->id);

            $division->name = $request->name;
            $division->tag = $request->tag;
            $division->color = $request->color;
            $division->save();

            return redirect()->route('eof.division.division')->with('success', 'Data divisi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('eof.division.division')->with('error', 'Terjadi kesalahan saat memperbarui data divisi.');
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:divisions,id',
        ]);

        try {
            $division = Division::findOrFail($request->id);

            $division->delete();

            return redirect()->route('eof.division.division')->with('success', 'Data divisi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('eof.division.division')->with('error', 'Terjadi kesalahan saat menghapus data divisi.');
        }
    }
}
