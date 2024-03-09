@extends('templates.header')
@section('tarefas')
    <h1 class="mt-5">Tarefas <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#cadastro-modal">Adicionar
            tarefa</button> </h1>

    <section class="py-3">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Número da tarefa (id)</th>
                        <th>Título da tarefa</th>
                        <th>Tipo da tarefa</th>
                        <th>Prioridade da tarefa</th>
                        <th>Data de abertura</th>
                        <th>Responsável pela tarefa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tarefas as $t)
                        @if ($t->responsavel_id == auth()->user()->id)
                            <tr style="background-color:orange">
                            @else
                            <tr>
                        @endif
                        <td><a style="text-decoration:none"
                                href="{{ route('view_details', ['id' => $t->id]) }}">{{ $t->id }}</a>
                        </td>
                        <td>{{ $t->titulo }}</td>
                        <td>{{ $t->tipo }}</td>
                        <td>{{ $t->prioridade }}</td>
                        <td>{{ date('d/m/Y', strtotime($t->created_at)) }}</td>
                        <td>{{ $t->name }}</td>

                        </tr>
                    @endforeach




                </tbody>
            </table>
            <div class="col-12 d-flex justify-content-end">{{ $tarefas->links() }}</div>
        </div>
    </section>
    <div class="modal fade" id="cadastro-modal" tabindex="-1" aria-labelledby="cadastro-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastro-modal-label">Cadastro de tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('create_tarefa') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input name='titulo' type="text" class="form-control" id="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select name="tipo" class="form-select" id="tipo" required>
                                <option value="incidente">Incidente</option>
                                <option value="solicitacao de serviço">Solicitação de Serviço</option>
                                <option value="melhorias">Melhorias</option>
                                <option value="projetos">Projetos</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="prioridade" class="form-label">Prioridade</label>
                            <select name="prioridade" class="form-select" id="prioridade" required>
                                <option value="alta">Alta</option>
                                <option value="media">Média</option>
                                <option value="baixa">Baixa</option>
                                <option value="sem-prioridade">Sem prioridade</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" class="form-control" id="descricao" required></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-dark">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
