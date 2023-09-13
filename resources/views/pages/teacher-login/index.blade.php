@extends('layouts.auth.index')

@section('content')
    <section class="card-auth">

        <div class="card-infos">
            <h4>Bem vindo ao Web-Prova</h4>
        </div>

        <form method="POST" action="{{ route('teachers.auth') }}">
            @csrf

            @error('authentication')
                <div class="mb-3">
                    <p class="invalid-feedback">Email ou senha inválido</p>
                </div>
            @enderror


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Lembrar-me</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </section>
@endsection
