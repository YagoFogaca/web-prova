@extends('layouts.platform.index')

@section('content')
    <section class="card-platform">
        <article class="d-flex justify-content-between infos">
            <h4>Cria prova</h4>
        </article>

        <section class="container-exams">
            <form action="{{ route('exams.store') }}" method="POST" class="row g-3">
                @csrf

                @error('create-exam')
                    <div class="mb-3">
                        <p class="invalid-feedback">Ocorreu um erro ao criar a prova</p>
                    </div>
                @enderror


                <div class="mb-3 col-md-6">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required
                        placeholder="Avaliação de lógica">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="matter" class="form-label">Matéria <span class="span-info">(Opcional)</span></label>
                    <input type="text" class="form-control" id="matter" name="matter"
                        placeholder="Lógica de Programação">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="points" class="form-label">Total de pontos</label>
                    <input type="number" class="form-control" id="points" name="points" required placeholder="10.0"
                        min="0">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="average" class="form-label">Média de pontos</label>
                    <input type="number" class="form-control" id="average" name="average" required placeholder="5"
                        step="0.01" min="0">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-bd-primary">Seguir</button>
                </div>

            </form>
        </section>

    </section>
@endsection
