<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        // Update expired agendas before displaying
        Agenda::updateExpiredAgendas();
        
        $agendas = Agenda::latest()->get();
        return view('admin.agendas.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:upcoming,ongoing,completed',
        ]);

        Agenda::create($request->all());

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil dibuat!');
    }

    public function show(Agenda $agenda)
    {
        return view('admin.agendas.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:upcoming,ongoing,completed',
        ]);

        $agenda->update($request->all());

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil diupdate!');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil dihapus!');
    }
}
