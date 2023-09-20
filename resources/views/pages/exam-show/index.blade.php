@extends('layouts.platform.index')

@section('content')
    <section class="card-platform card-platform-variation">
        <section class="card-exam">

            <div class="d-flex justify-content-between flex-wrap align-items-center">
                <h5>Título: {{ $exam['title'] }}</h5>

                <div class="btn-group">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Editar</a></li>
                        <li><a class="dropdown-item" href="#">Apagar</a></li>
                    </ul>
                </div>
            </div>

            <div class="d-flex justify-content-between flex-wrap align-items-top">
                <div>
                    <p>Total de pontos: {{ $exam['points'] }}</p>
                    <p>Média de pontos: {{ $exam['average'] }}</p>
                </div>
                <p>Matéria: {{ $exam['matter'] ?? 'Não definido' }}</p>
            </div>


            @if (count($exam['questions']) < 2 || $exam['remaining_points'] > 0)
                <div>
                    @if (count($exam['questions']) < 2)
                        <p class="text-danger">
                            Você precisa criar no minimo 2 questões para liberar a prova.
                        </p>
                    @endif

                    @if ($exam['remaining_points'] > 0 || !$exam['remaining_points'])
                        <p class="text-danger">
                            Você precisa distribuir todos os pontos para liberar a prova.
                        </p>
                    @endif

                </div>
            @elseif ($exam['access_code'])
                <div class="d-flex justify-content-between flex-wrap align-items-top">
                    <div>
                        <p>Data e hora de inicio: </br> {{ $exam['access'] }}</p>
                        <p>Data e hora de terminio: </br> {{ $exam['access_termination'] }}</p>
                    </div>
                    <div class="access_code">
                        <p>Código de acesso: </br>{{ $exam['access_code'] }}</p>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-between flex-wrap align-items-top">
                    <div>
                        <button class="btn btn-primary btn-bd-primary" id="btn-access-code">Gerar código de acesso</button>
                    </div>
                </div>
            @endif

        </section>

        <section class="container-nav-tabs">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#questions"
                        type="button" role="tab" aria-controls="questions" aria-selected="true">Questões</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#students" type="button"
                        role="tab" aria-controls="students" aria-selected="false">Alunos</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                @include('components.tab-pane-questions.index', ['questions' => $exam['questions']])
                @include('components.tab-pane-students.index')

            </div>

        </section>

    </section>
@endsection
