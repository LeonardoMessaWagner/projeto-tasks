<?php

namespace App\Http\Controllers;

use App\Models\Observacoes;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use \App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TarefaController extends Controller
{
    public function view()
    {
        $tarefas = DB::table('tarefas')->join('users', 'tarefas.responsavel_id', '=', 'users.id')->select(
            'tarefas.id',
            'tarefas.titulo',
            'tarefas.tipo',
            'tarefas.prioridade',
            'tarefas.descricao',
            'users.name',
            'tarefas.created_at',
            'tarefas.responsavel_id'
        )->where('tarefas.situacao', 0)->orderBy('tarefas.id')->paginate(10);


        return view('tarefas', compact('tarefas'));
    }
    public function create(Request $request)
    {
        $this->validate($request, ['titulo' => 'required', 'tipo' => 'required', 'prioridade' => 'required', 'descricao' => 'required']);
        $tarefa = new Tarefa($request->only('titulo','tipo','prioridade','descricao'));
        $tarefa->responsavel_id = Auth::user()->id;
        $tarefa->situacao = false;

        if ($tarefa->save()) {
            Alert::success('Tudo certo!', "a tarefa com o id $tarefa->id foi inserida com sucesso");
        } else {
            Alert::error('Ops!', 'Algo deu errado!');
        }
        return redirect()->route('tarefas');

    }

    public function details($id)
    {
        $tarefa = Tarefa::find($id);
        $usuario = User::find($tarefa->responsavel_id);
        $obs = DB::table('observacoes')->join('tarefas', 'observacoes.tarefa_id', '=', 'tarefas.id')
            ->join('users', 'observacoes.user_id', '=', 'users.id')
            ->select('observacoes.created_at', 'observacoes.observacao', 'users.name', 'users.id', 'observacoes.id as id_obs')->orderBy('created_at', 'desc')->where('observacoes.tarefa_id', $id)->get();
        return view('detalhes', compact('tarefa', 'usuario', 'obs'));
    }

    public function change_responsible(Request $request)
    {
        $tarefa = Tarefa::find($request->id);
        $tarefa->responsavel_id = auth()->user()->id;
        if ($tarefa->save()) {
            Alert::success("Sucesso!", "A partir de agora você está responsavel por está tarefa.");
        } else {
            Alert::error("Ops!", "Algo deu errado");
        }

        return redirect()->route('view_details', ['id' => $tarefa->id]);
    }

    public function finish(Request $request)
    {
        $obs = new Observacoes($request->only('observacao', 'tarefa_id'));
        $obs->user_id = auth()->user()->id;
        if ($obs->save()) {
            $tarefa = Tarefa::find($request->tarefa_id);
            $tarefa->situacao = 1;
            if ($tarefa->save()) {
                Alert::success("Tudo certo!", "A Tarefa $tarefa->id foi concluída!");
            } else {
                Alert::error("Ops!", "Algo deu errado!");
            }
        }
        return redirect()->route('view_details', ['id' => $tarefa->id]);
    }
}