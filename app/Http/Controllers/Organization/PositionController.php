<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller

{
    public function showEofPosition()
    {
        $positions = Position::withCount('users')->get();

        return view('content.eof-position', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:positions,name',
            'tag' => 'required|string|max:10|unique:positions,tag',
            'color' => 'required|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        Position::create([
            'name' => $request->name,
            'tag' => $request->tag,
            'color' => $request->color,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data jabatan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:positions,id',
            'name' => 'required|string|max:255|unique:positions,name,' . $request->id,
            'tag' => 'required|string|max:255|unique:positions,tag,' . $request->id,
            'color' => 'required|string|max:7',
        ]);
        try {
            $position = Position::findOrFail($request->id);

            $position->update([
                'name' => $request->name,
                'tag' => $request->tag,
                'color' => $request->color,
            ]);

            return redirect()->back()->with('success', 'Data jabatan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data jabatan.');
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:positions,id',
        ]);

        try {
            $position = Position::findOrFail($request->id);

            $position->delete();

            return redirect()->route('eof.position.position')->with('success', 'Data jabatan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('eof.position.position')->with('error', 'Terjadi kesalahan saat menghapus data jabatan.');
        }
    }
}
