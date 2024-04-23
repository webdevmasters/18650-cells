<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard()
    {
        $income = Cell::where('sold', 1)->sum('price');
        $equipment = 13700;
        $investment = 47120;
        $profit = $income - ($investment + $equipment);

        $cellGroups = Cell::select(
            DB::raw('CONCAT(FLOOR(tested_capacity / 200) * 200, "-", (FLOOR(tested_capacity / 200) + 1) * 200) AS capacity_range'),
            DB::raw('COUNT(*) as total_cells'),
            DB::raw('SUM(CASE WHEN sold = 1 THEN 1 ELSE 0 END) as sold_cells'),
            DB::raw('SUM(CASE WHEN sold = 0 THEN 1 ELSE 0 END) as left_cells')
        )
            ->where('brand', '!=', 'POWERBANK')
            ->groupBy('capacity_range')
            ->orderBy('capacity_range')
            ->get();

        return view('admin.cells.dashboard')
            ->with('cellGroups', $cellGroups)
            ->with('income', $income)
            ->with('equipment', $equipment)
            ->with('investment', $investment)
            ->with('profit', $profit);
    }
}
