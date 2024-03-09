@extends('templates.header')

@section('detalhes')
    <h1 class="mt-5">Detalhes da tarefa {{ $tarefa->id }} </h1>
    <h2> {{ $tarefa->titulo }} </h2>
    <h4>Responsável: {{ $usuario->name }}</h4>
    @if (auth()->user()->id != $tarefa->responsavel_id)
        <form method="post" action="{{ route('change_responsible') }}">
            @csrf
            <button class="btn btn-dark" value="{{ $tarefa->id }}" name="id" type="submit">Assumir tarefa</button>
        </form>
    @endif
    <br>
    <div class="row">
        <div class="col-8 ">
            <textarea rows="8" class="form-control" readonly>{{ $tarefa->descricao }}</textarea>
        </div>
        <div class="col-4">
            <h6>Prioridade: {{ $tarefa->prioridade }}</h6>
            <h6>Tipo: {{ $tarefa->tipo }}</h6>
            <h6>Criação: {{ date('d/m/Y', strtotime($tarefa->created_at)) }}</h6>
            @if ($tarefa->situacao == 0)
                <h6>Situação: Aberta</h6>
                @if ($tarefa->responsavel_id == auth()->user()->id)
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalFinalizar">
                        Finalizar Tarefa</button>
                    <div class="modal fade" id="modalFinalizar" tabindex="-1" aria-labelledby="modalFinalizarLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">Finalizar Tarefa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('finish') }}" method="post">
                                        @csrf

                                        <textarea rows="5" class="form-control" name="observacao" required></textarea>
                                        <br>
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                            class="btn
                                            btn-danger">Cancelar</button>
                                        <button type="submit" name="tarefa_id" value="{{ $tarefa->id }}"
                                            class="btn btn-dark">Finalizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <h6>Situação: Concluída</h6>
            @endif

        </div>
    </div><br>
    <div class="row">
        <div class="col-8">
            <h6> Nova Observação </h6>
            @if (auth()->user()->id == $tarefa->responsavel_id && $tarefa->situacao == 0)
                <form method="post" action="{{ route('create_observacao') }}">
                    @csrf
                    <textarea name="observacao" rows="8" class="form-control" required></textarea><br>
                    <button type="submit" class="btn btn-dark" value="{{ $tarefa->id }}"
                        name="tarefa_id">Salvar</button>
                </form>
            @else
                <textarea rows="8" class="form-control" readonly></textarea><br>
                <button type="button" class="btn btn-dark" disabled>Salvar</button>
            @endif
        </div>
        <div class="col-4">
            <h6> Observações </h6>
            @for ($i = 0; $i < count($obs); $i++)
                <h5>{{ $obs[$i]->name }} em {{ date('d/m/Y', strtotime($obs[$i]->created_at)) }} as
                    {{ date('H:i', strtotime($obs[$i]->created_at)) }}</h5>
                <p> {{ $obs[$i]->observacao }}</p>
                @if ($i == 0 && $obs[$i]->id == auth()->user()->id && $tarefa->situacao == 0)
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalObservacoes">
                        Editar</button>

                    <div class="modal fade" id="modalObservacoes" tabindex="-1" aria-labelledby="modalObservacoesLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalObservacoesLabel">Editar Observação</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update_observacao') }}" method="post">
                                        @csrf

                                        <textarea rows="5" class="form-control" name="observacao" placeholder="{{ $obs[$i]->observacao }}" required></textarea>
                                        <br>
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                            class="btn
                                            btn-danger">Cancelar</button>
                                        <button type="submit" class="btn btn-dark" value="{{ $obs[$i]->id_obs }}"
                                            name="id">Salvar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endif
                <br>
            @endfor
        </div>
    </div>
@endsection
