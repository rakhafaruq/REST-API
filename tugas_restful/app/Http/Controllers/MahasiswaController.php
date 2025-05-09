<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::orderBy('id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Mahasiswa',
            'data' => $data
        ], 200);
    }
}
