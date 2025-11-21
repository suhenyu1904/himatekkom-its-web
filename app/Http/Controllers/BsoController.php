<?php

namespace App\Http\Controllers;

use App\Models\Bso;
use Illuminate\Http\Request;

class BsoController extends Controller
{
    public function show(Bso $bso)
    {
        // Pastikan BSO aktif
        if (!$bso->is_active) {
            abort(404);
        }

        return view('bso.show', compact('bso'));
    }
}
