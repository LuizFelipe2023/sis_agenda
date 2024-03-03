<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AgendamentoController extends Controller
{
    public function dashboard()
    {
        $agendamentos = Agendamento::with('user')->get();
        return view('dashboard', compact('agendamentos'));
    }

    public function create()
    {
        return view('create');
    }

    public function agendamento_submit(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i'
        ]);

        $existingAgendamento = Agendamento::where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if ($existingAgendamento) {
            return back()->withErrors(['time' => 'Já existe um agendamento para esta data e hora.']);
        }

        $user = Auth::user();

        $agendamento = new Agendamento([
            'user_id' => $user->id,
            'name' => $user->name,
            'date' => $request->date,
            'time' => $request->time
        ]);

        $agendamento->save();

        return redirect()->route('dashboard')->withSuccess('Agendamento criado com sucesso');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        return view('edit', compact('agendamento'));
    }

    public function edit_submit(Request $request, $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i'
        ]);

        $user = Auth::user();

        $agendamento->update([
            'date' => $request->date,
            'time' => $request->time
        ]);

        return redirect()->route('dashboard')->withSuccess('Agendamento atualizado com sucesso');
    }

    public function delete($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        if ($agendamento->user_id !== Auth::id()) {
            return redirect()->back()->withErrors(['error' => 'Você não tem permissão para excluir este agendamento.']);
        }

        $agendamento->delete();

        return redirect()->route('dashboard')->withSuccess('Agendamento excluído com sucesso');
    }
}
