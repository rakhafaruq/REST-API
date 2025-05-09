<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return Mahasiswa::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create($request->only(['nim', 'nama', 'no_hp']));
            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'message' => 'Data mahasiswa berhasil ditambahkan.',
                'data' => $mahasiswa,
            ], 201);
    }

    public function show($id)
    {
        $mhs = Mahasiswa::find($id);
        if ($mhs) {
        return $mhs ? response()->json($mhs) : response()->json(['message' => 'Data ditemukan'], 200);
    } else {
        return response()-> json(['message' => 'Data tidak ditemukan'], 404);
    }
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id);
        if (!$mhs) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $mhs->update($request->only(['nim', 'nama', 'no_hp']));
        return response()->json($mhs);
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::find($id);
        if (!$mhs) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $mhs->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
