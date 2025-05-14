<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller

{
    public function showEofSection()
    {
        $sections = Section::withCount('users')->get();

        return view('content.eof-section', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sections,name',
            'tag' => 'required|string|max:10|unique:sections,tag',
            'color' => 'required|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        Section::create([
            'name' => $request->name,
            'tag' => $request->tag,
            'color' => $request->color,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data divisi.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sections,id',
            'name' => 'required|string|max:255|unique:sections,name,' . $request->id,
            'tag' => 'required|string|max:255|unique:sections,tag,' . $request->id,
            'color' => 'required|string|max:7',
        ]);
        try {
            $section = Section::findOrFail($request->id);

            $section->update([
                'name' => $request->name,
                'tag' => $request->tag,
                'color' => $request->color,
            ]);

            return redirect()->back()->with('success', 'Data bagian berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data bagian.');
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sections,id',
        ]);

        try {
            $section = Section::findOrFail($request->id);

            $section->delete();

            return redirect()->route('eof.section.section')->with('success', 'Data bagian berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('eof.section.section')->with('error', 'Terjadi kesalahan saat menghapus data bagian.');
        }
    }
}
