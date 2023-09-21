<div class="tab-pane fade show active" id="questions" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <article class="d-flex justify-content-between align-items-center infos infos-variation">
        <h5>Questões</h5>
        @if ($exam['remaining_points'] > 0 || !$exam['remaining_points'])
            <a class="btn btn-primary btn-bd-primary btn-sm"
                href="{{ route('questions.create', ['exam' => $exam['id']]) }}">Criar Questão</a>
        @endif
    </article>

    <div>
        @foreach ($questions as $key => $question)
            <div class="card card-question">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Questão {{ $key + 1 }}</h5>
                        <p>Valor: {{ $question['points'] }}</p>
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
                    <p class="card-text">{{ $question['statement'] }}</p>
                </div>

                <ul class="list-group list-group-flush">
                    @foreach ($question['alternatives'] as $key => $alternative)
                        <li
                            class="list-group-item {{ $alternative['correct_alternative'] ? 'bg-success-subtle' : '' }}">
                            {{ $key === 0 ? 'A)' : ($key === 1 ? 'B)' : ($key === 2 ? 'C)' : ($key === 3 ? 'D)' : 'E)'))) }}
                            {{ $alternative['alternative'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>
</div>
