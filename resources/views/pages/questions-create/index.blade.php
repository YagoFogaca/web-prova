@extends('layouts.platform.index')

@section('content')
    <section class="card-platform">
        <article class="d-flex justify-content-between infos">
            <h4>Criar Questão</h4>
        </article>

        <section class="container-exams">
            <form action="{{ route('questions.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="mb-3">
                    <label for="statement" class="form-label">Enunciado</label>
                    <textarea class="form-control form-control-textarea" placeholder="Escreva seu enunciado" id="statement" name="statement"
                        required autocomplete></textarea>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="points" class="form-label">Pontos</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="points" class="form-control" name="points" min="0.10"
                            step="0.1" placeholder="Valor da questão" required>
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            Faltam {{ $remaining_points }} pontos a serem distribuidos.
                        </span>
                    </div>

                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <h5 class="m-0">Respostas</h5>
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            Ao menos duas repostas devem ser criadas.
                        </span>
                    </div>
                </div>


                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="alternative" class="col-form-label">Alternativa A)</label>
                    </div>
                    <div class="col-auto col-auto-variation">
                        <input type="text" id="alternative" class="form-control" name="alternative[a]"
                            placeholder="Escreva sua alternativa" required>
                    </div>
                    <div class="col-auto">
                        <input type="radio" class="form-check-input" id="correct_alternative" name="correct_alternative"
                            value="a" checked>
                        <label for="correct_alternative" class="form-check-label">Reposta correta</label>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="alternative-b" class="col-form-label">Alternativa B)</label>
                    </div>
                    <div class="col-auto col-auto-variation">
                        <input type="text" id="alternative-b" class="form-control" name="alternative[b]"
                            placeholder="Escreva sua alternativa" required>
                    </div>
                    <div class="col-auto">
                        <input type="radio" class="form-check-input" id="alternative-check-b" name="correct_alternative"
                            value="b">
                        <label for="alternative-check-b" class="form-check-label">Reposta correta</label>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="alternative-c" class="col-form-label">Alternativa C)</label>
                    </div>
                    <div class="col-auto col-auto-variation">
                        <input type="text" id="alternative-c" class="form-control" name="alternative[c]"
                            placeholder="Escreva sua alternativa">
                    </div>
                    <div class="col-auto">
                        <input type="radio" class="form-check-input" id="alternative-check-c" name="correct_alternative"
                            value="c">
                        <label for="alternative-check-c" class="form-check-label">Reposta correta</label>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="alternative-d" class="col-form-label">Alternativa D)</label>
                    </div>
                    <div class="col-auto col-auto-variation">
                        <input type="text" id="alternative-d" class="form-control" name="alternative[d]"
                            placeholder="Escreva sua alternativa">
                    </div>
                    <div class="col-auto">
                        <input type="radio" class="form-check-input" id="alternative-check-d"
                            name="correct_alternative" value="d">
                        <label for="alternative-check-d" class="form-check-label">Reposta correta</label>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="alternative-e" class="col-form-label">Alternativa E)</label>
                    </div>
                    <div class="col-auto col-auto-variation">
                        <input type="text" id="alternative-e" class="form-control" name="alternative[e]"
                            placeholder="Escreva sua alternativa">
                    </div>
                    <div class="col-auto">
                        <input type="radio" class="form-check-input" id="alternative-check-e"
                            name="correct_alternative" value="e">
                        <label for="alternative-check-e" class="form-check-label">Reposta correta</label>
                    </div>
                </div>

                <input type="hidden" name="exam_id" value="{{ $exam_id }}">

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-bd-primary">Criar</button>
                </div>

            </form>

        </section>

    </section>
@endsection
