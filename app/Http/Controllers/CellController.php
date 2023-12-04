<?php

namespace App\Http\Controllers;

use App\Http\Requests\CellRequest;
use App\Models\Cell;
use App\Models\Color;
use Illuminate\Http\Request;

class CellController extends Controller
{
    public function index()
    {
        $cells = Cell::with(['wrapColor', 'ringColor'])->get();
        return view('admin.cells.index')->with('cells', $cells)->with('models', $cells->sortBy('model')->pluck('model', 'id')->unique());
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

    public function sell($data)
    {
        try {
            $sell_data = json_decode($data);
            Cell::where('id', $sell_data->id)->update(['sold' => $sell_data->sold == 1]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cell selling failed']);
        }
        return response()->json(['message' => $sell_data->sold == 1 ? 'Cell successfully sold' : 'Cell successfully unsold']);
    }

    public function destroy(Request $request)
    {
        try {
            $cell = Cell::findOrFail($request->id);
            $cell->destroy($cell->id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cell with id ' . $request->id . ' was not found']);
        }
        return response()->json(['message' => 'Cell successfully deleted']);
    }
}
