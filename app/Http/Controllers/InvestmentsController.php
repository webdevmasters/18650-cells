<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;

class InvestmentsController extends Controller
{
    public function index(){
        $investment = Investment::first();
        return view('admin.investments.index', compact('investment'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'equipment' => 'nullable|numeric',
            'batteries' => 'nullable|numeric',
            'kp' => 'nullable|numeric',
        ]);

        $investment = Investment::firstOrCreate([]);

        $investment->equipment += $request->input('equipment', 0);
        $investment->batteries += $request->input('batteries', 0);
        $investment->kp += $request->input('kp', 0);
        $investment->save();

        return redirect()->route('admin.investments.index')->with('success', 'Investments updated successfully!');
    }
}
