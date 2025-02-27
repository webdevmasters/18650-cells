<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard()
    {
        $income = Cell::where('sold', 1)->sum('price');
        $investment = Investment::first();
        $equipment = $investment->equipment;
        $batteries = $investment->batteries;
        $kp = $investment->kp;
        $profit = $income - ($batteries + $equipment + $kp);

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

        $cellsSoldLastMonth = Cell::where('sold', true)->whereBetween('updated_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->get();

        $cellsSoldThisMonth = Cell::where('sold', true)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()
        ])->get();

        $cellsSoldLast3Months = Cell::where('sold', true)->where('updated_at', '>=', Carbon::now()->subMonths(3))->get();
        $cellsSoldLast6Months = Cell::where('sold', true)->where('updated_at', '>=', Carbon::now()->subMonths(6))->get();
        $cellsSoldLastYear = Cell::where('sold', true)->where('updated_at', '>=', Carbon::now()->subYear())->get();
        $cellsSoldThisYear = Cell::where('sold', true)->where('updated_at', '>=', Carbon::now()->startOfYear())->get();

        return view('admin.cells.dashboard')
            ->with('cellGroups', $cellGroups)
            ->with('last_month', $cellsSoldThisMonth)
            ->with('this_month', $cellsSoldLastMonth)
            ->with('last_3_months', $cellsSoldLast3Months)
            ->with('last_6_months', $cellsSoldLast6Months)
            ->with('last_year', $cellsSoldLastYear)
            ->with('this_year', $cellsSoldThisYear)
            ->with('income', $income)
            ->with('equipment', $equipment)
            ->with('batteries', $batteries)
            ->with('kp', $kp)
            ->with('profit', $profit);
    }

    public function filter(Request $request)
    {
        $capacityRange = $request->input('capacity');

        [$min, $max] = explode('-', $capacityRange);
        $cells = $this->getTopUnsoldCells($min, $max);
        return response()->json($cells);
    }

    private function getTopUnsoldCells($min = null, $max = null)
    {
        $query = Cell::select('model', 'brand')
            ->where('sold', false)
            ->where('brand', '!=', 'POWERBANK')
            ->when($min && $max, function ($q) use ($min, $max) {
                $q->whereBetween('tested_capacity', [(int)$min, (int)$max]);
            })
            ->with(['wrapColor', 'ringColor'])  // Load color relations
            ->groupBy('model', 'brand', 'wrap_color_id', 'ring_color_id')
            ->selectRaw('count(*) as quantity, wrap_color_id, ring_color_id')
            ->orderByDesc('quantity')
            ->limit(10)
            ->get()
            ->map(function ($cell) {
                return [
                    'model' => $cell->model,
                    'brand' => $cell->brand,
                    'wrap_color' => $cell->wrapColor->code ?? 'N/A',   // Get hex code or fallback
                    'ring_color' => $cell->ringColor->code ?? 'N/A',   // Get hex code or fallback
                    'quantity' => $cell->quantity,
                ];
            });

        return $query;

        return $query;
    }

    public function getTopModels()
    {
        $cells = Cell::select('model', 'brand')                         // Only unsold cells
            ->where('brand', '!=', 'POWERBANK')                 // Exclude POWERBANK
            ->with(['wrapColor', 'ringColor'])                 // Load wrap and ring color relations
            ->groupBy('model', 'brand', 'wrap_color_id', 'ring_color_id')
            ->selectRaw('count(*) as quantity, wrap_color_id, ring_color_id')
            ->orderByDesc('quantity')                          // Order by quantity (desc)
            ->limit(10)                                        // Top 10 models
            ->get()
            ->map(function ($cell) {
                return [
                    'model' => $cell->model,
                    'brand' => $cell->brand,
                    'wrap_color' => $cell->wrapColor->code ?? 'N/A',
                    'ring_color' => $cell->ringColor->code ?? 'N/A',
                    'quantity' => $cell->quantity,
                ];
            });

        return response()->json($cells);
    }
}
