<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::where('status', 'active')
            ->orderBy('tanggal', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $agendas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $agenda = Agenda::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Agenda created successfully',
            'data' => $agenda
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        if ($agenda->status !== 'active' && !auth()->user()?->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Agenda not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $agenda
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|required|string',
            'tanggal' => 'sometimes|required|date',
            'status' => 'sometimes|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $agenda->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Agenda updated successfully',
            'data' => $agenda
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return response()->json([
            'success' => true,
            'message' => 'Agenda deleted successfully'
        ]);
    }

    /**
     * Get upcoming agendas
     */
    public function upcoming()
    {
        $agendas = Agenda::where('status', 'active')
            ->where('tanggal', '>=', now()->toDateString())
            ->orderBy('tanggal', 'asc')
            ->limit(5)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $agendas
        ]);
    }
}
