<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'barcode_name' => 'required|string',
            'value' => 'required|string',
        ]);

        Barcode::create([
            'barcode_name' => $request->barcode_name,
            'value' => $request->value,
            'recorded_at' => now(),
        ]);

        return response()->json(['message' => 'Data Barcode disimpan'], 201);
    }

    public function index()
    {
        return response()->json(Barcode::latest()->take(50)->get());
    }
    
}
