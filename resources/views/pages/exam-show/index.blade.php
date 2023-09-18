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


            @if (!$exam['questions'])
                <div>
                    <p class="text-danger">
                        Você não criou nenhuma questão para a prova, crie para liberar o acesso a prova.</a>
                    </p>
                </div>
            @else
                <div class="d-flex justify-content-between flex-wrap align-items-top">
                    <div>
                        <p>Data e hora de inicio: </br> {{ $exam['access'] }}</p>
                        <p>Data e hora de terminio: </br> {{ $exam['access_termination'] }}</p>
                    </div>
                    <div class="access_code">
                        <p>Código de acesso: </br>{{ $exam['access_code'] }}</p>
                    </div>
                </div>
            @endif

        </section>

        <section class="container-nav-tabs">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Questões</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Alunos</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">Questões</div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">Alunos</div>
            </div>

        </section>

    </section>
@endsection
