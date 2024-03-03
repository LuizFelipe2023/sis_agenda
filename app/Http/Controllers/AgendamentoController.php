<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
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
        $userId = Auth::id();

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i'
        ], [
            'user_id.required' => 'O ID do usuário é obrigatório.',
            'user_id.exists' => 'O ID do usuário fornecido não existe.',
            'date.required' => 'A data é obrigatória.',
            'date.date' => 'A data deve estar em um formato válido.',
            'time.required' => 'A hora é obrigatória.',
            'time.date_format' => 'A hora deve estar em um formato válido (HH:MM).',
        ]);

        $existingAgendamento = Agendamento::where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if ($existingAgendamento) {
            return back()->withErrors(['time' => 'Já existe um agendamento para esta data e hora.']);
        }
        $user = User::findOrFail($userId);

        Agendamento::create([
            'user_id' => $userId,
            'user_name' => $user->name,
            'date' => $request->date,
            'time' => $request->time
        ]);

        return redirect()->route('dashboard')->withSuccess('Agendamento criado com sucesso');
    }
    public function edit($id){
        $agendamento = Agendamento::find($id);
        return view('edit', ['agendamento' => $agendamento]);
    }
    public function edit_submit(Request $request, $id){
            $agendamento = Agendamento::find($id);
            if(!$agendamento){
                return redirect()->back()->with('errors','Não foi encontrado nenhum agendamento!');
            }
            $userId = Auth::id();
            $validatedData = $request->validate([
                'date' => 'required|date',
                'time' => 'required|date_format:H:i'
            ]);
            if(!$validatedData){
                return redirect()->back()->with('errors','Preencha os campos corretamente!');
            }
            $arrayData =[
                'user_id' => $userId,
                'date' => $request->date,
                'time' => $request->time
            ];
            $agendamento->update($arrayData);
            return redirect()->route('dashboard')->with('success','Agendamento atualizado com sucesso');
    
    }
    public function delete($id) {
        $agendamento = Agendamento::find($id);
        if(!$agendamento) {
            return redirect()->back()->withErrors(['error' => 'Agendamento não encontrado']);
        }
        if($agendamento->user_id != Auth::id()) {
            return back()->withErrors(['error' => 'Você não tem permissão para excluir este agendamento.']);
        }
        $agendamento->delete();
        return redirect()->route('dashboard')->withSuccess('Agendamento excluído com sucesso');
    }
    
}
