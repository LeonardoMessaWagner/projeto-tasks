@extends('templates.header')

@section('login-cadastro')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Login</h2>
                    <form method="post" action="{{route('login')}}">
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input name="password" type="password" class="form-control" id="senha" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
