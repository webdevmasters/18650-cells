<?php

namespace App\Http\Controllers;

use App\Http\Requests\CellRequest;
use App\Models\Cell;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;

class CellController extends Controller
{
    public function index()
    {
        $cells = Cell::with(['wrapColor', 'ringColor'])->orderBy('created_at','desc');
        return view('admin.cells.index')

            ->with('models', $cells->get()->sortBy('model')->pluck('model', 'id')->unique())
            ->with('brands', $cells->get()->sortBy('brand')->pluck('brand', 'id')->unique())
            ->with('cells', $cells->unsold()->get());
    }

    public function filterCells(Request $request)
    {
        // Retrieve input parameters
        $capacity = $request->input('capacity');
        $model = $request->input('model');
        $brand = $request->input('brand');
        $sold = $request->input('sold');

        // Build the query based on selected parameters
        $query = Cell::query()->with(['wrapColor', 'ringColor']);

        if ($capacity && $capacity !== 'all') {
            // Extract the range values
            [$minCapacity, $maxCapacity] = explode('-', $capacity);
            // Use BETWEEN clause for capacity
            $query->whereBetween('tested_capacity', [$minCapacity, $maxCapacity - 1]);
        }

        if ($model && $model !== '0') $query->where('model', $model);
        if ($brand && $brand !== '0') $query->where('brand', $brand);
        if ($sold !== null && $sold !== 'all') $query->where('sold', $sold);

        // Get the filtered data
        $cells = $query->orderBy('tested_capacity')->get();

        $cells_table = view('admin.includes.cells_table')->with('cells', $cells)->render();
        $model_dropdown = view('admin.includes.model_dropdown')->with('models', $cells->sortBy('model')->pluck('model')->unique())->render();

        // Return the filtered data as a JSON response
        return response()->json(['cells_table' => $cells_table, 'model_dropdown' => $model_dropdown]);
    }

    public function store(CellRequest $request)
    {
        try {
            $validated = $request->validated();
            $cell = new Cell();
            $cell->model = $validated['model'];
            $cell->brand = $validated['brand'];
            $cell->capacity = $validated['capacity'];
            $cell->tested_capacity = $validated['tested_capacity'];
            $cell->resistance = $validated['resistance'];
            $cell->discharge_current = $validated['discharge_current'];

            $wrap_color = Color::firstOrCreate(['code' => $validated['wrap_color']]);
            $ring_color = Color::firstOrCreate(['code' => $validated['ring_color']]);

            $cell->wrap_color_id = $wrap_color->id;
            $cell->ring_color_id = $ring_color->id;
            $cell->price = $validated['price'];
            $cell->note = $validated['note'];
            $cell->sold = $request->has('sold');
            $cell->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cell model' . $cell->model . ' failed to create']);
        }
        return response()->json(['message' => 'Cell model' . $cell->model . ' successfully created']);
    }

    public function edit($id)
    {
        try {
            $cell = Cell::with(['wrapColor', 'ringColor'])->findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cell with id ' . $id . ' was not found']);
        }

        return response()->json($cell);
    }

    public function update(CellRequest $request)
    {
        try {
            $validated = $request->validated();
            $wrap_color = Color::firstOrCreate(['code' => $validated['wrap_color']]);
            $ring_color = Color::firstOrCreate(['code' => $validated['ring_color']]);

            Cell::where('id', $request->id)->update([
                'model' => $validated['model'],
                'brand' => $validated['brand'],
                'capacity' => $validated['capacity'],
                'tested_capacity' => $validated['tested_capacity'],
                'resistance' => $validated['resistance'],
                'price' => $validated['price'],
                'sold' => $request->has('sold'),
                'note' => $validated['note'],
                'wrap_color_id' => $wrap_color->id,
                'ring_color_id' => $ring_color->id,
                'discharge_current' => $validated['discharge_current'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cell model' . $validated['model'] . ' update failed']);
        }
        return response()->json(['message' => 'Cell model' . $validated['model'] . ' successfully updated']);
    }

    public function sell(Request $request)
    {
        try {
            $capacity = $request->input('capacity');
            $model = $request->input('model');
            $brand = $request->input('brand');
            $sold = $request->input('sold');
            $status = $request->input('status');
            $id = $request->input('id');

            Cell::where('id', $id)->update(['sold' => $sold == 1]);

            // Build the query based on selected parameters
            $query = Cell::query()->with(['wrapColor', 'ringColor']);

            if ($capacity && $capacity !== 'all') {
                // Extract the range values
                [$minCapacity, $maxCapacity] = explode('-', $capacity);
                // Use BETWEEN clause for capacity
                $query->whereBetween('tested_capacity', [$minCapacity, $maxCapacity - 1]);
            }

            if ($model && $model !== '0') $query->where('model', $model);
            if ($brand && $brand !== '0') $query->where('brand', $brand);
            if ($status !== null && $status !== 'all') $query->where('sold', $status);

            // Get the filtered data
            $cells = $query->orderBy('tested_capacity')->get();

            $cells_table = view('admin.includes.cells_table')->with('cells', $cells)->render();
            $model_dropdown = view('admin.includes.model_dropdown')->with('models', $cells->sortBy('model')->pluck('model')->unique())->render();

            return response()->json([
                'cells_table' => $cells_table,
                'model_dropdown' => $model_dropdown,
                'status' => $status,
                'brands' => $cells->pluck('brand', 'id')->unique(),
                'message' => $sold == 1 ? 'Cell successfully sold' : 'Cell successfully unsold'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cell selling failed']);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $cell = Cell::findOrFail($request->id);
            $cell->delete(); // Use the model's delete method
            return response()->json(['message' => 'Cell successfully deleted']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cell with ID ' . $request->id . ' was not found'], 404);
        }
    }

    // Fetch the current price for the given tested capacity range
    public function getPrice(Request $request)
    {
        $range = explode('-', $request->capacity);
        $min = (int)$range[0];
        $max = (int)$range[1];

        $price = Cell::where('tested_capacity', '>=', $min)
            ->where('tested_capacity', '<', $max)
            ->where('sold', false)
            ->avg('price'); // Use average or min/max as needed

        return response()->json(['price' => number_format($price ?? 0, 0)]);
    }

    // Update the price for cells in the given tested capacity range
    public function updatePrice(Request $request)
    {
        $request->validate([
            'capacity' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $range = explode('-', $request->capacity);
        $min = (int)$range[0];
        $max = (int)$range[1];

        Cell::where('tested_capacity', '>=', $min)
            ->where('tested_capacity', '<', $max)
            ->where('sold', false)
            ->update(['price' => $request->price]);

        return response()->json(['message' => 'Price updated successfully!']);
    }
}
