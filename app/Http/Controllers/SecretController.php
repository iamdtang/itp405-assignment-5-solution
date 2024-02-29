<?php

namespace App\Http\Controllers;

use App\Models\Configuration;


use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function index(Request $request)
    {
        return view('secret', [
            'isInMaintenance' => Configuration::where('name', '=', 'maintenance-mode')->first()->value
        ]);
    }

    public function store(Request $request)
    {
        $configuration = Configuration::where('name', '=', 'maintenance-mode')->first();
        $configuration->value = $request->boolean('maintenance');
        $configuration->save();

        return redirect()->route('secret.index')->with('success', true);
    }
}
