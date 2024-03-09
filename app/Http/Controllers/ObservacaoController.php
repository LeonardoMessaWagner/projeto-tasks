<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observacoes;
use RealRashid\SweetAlert\Facades\Alert;

class ObservacaoController extends Controller
{
    public function create(Request $request)
    {
        $obs = new Observacoes($request->only('observacao', 'tarefa_id', ));
        $obs->user_id = auth()->user()->id;
        if ($obs->save()) {
            Alert::success('Tudo certo!', 'Observação registrada!');
        } else {
            Alert::error('Ops!', 'Algo deu errado');
        }
        return redirect()->route('view_details', ['id' => $obs->tarefa_id]);

    }
    public function update(Request $request)
    {
        $obs = Observacoes::find($request->id);

        $obs->observacao = $request->observacao;

        if ($obs->save()) {
            Alert::success('Tudo certo!', 'Observação atualizada!');
        } else {
            Alert::error('Ops!', 'Algo deu errado');
        }
        return redirect()->route('view_details', ['id' => $obs->tarefa_id]);
    }
}