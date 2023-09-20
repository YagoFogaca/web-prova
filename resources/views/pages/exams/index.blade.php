@extends('layouts.platform.index')

@section('content')
    <section class="card-platform">
        <article class="d-flex justify-content-between align-items-center infos">
            <h4>Suas Provas</h4>
            <a class="btn btn-primary btn-bd-primary" href="{{ route('exams.create') }}">Criar prova</a>
        </article>

        <section class="container-exams display-table">

            <table>
                <thead>
                    <tr>
                        <th class="title">Título</th>
                        <th>Matéria</th>
                        <th class="table-row">T/Pontos</th>
                        <th class="table-row">M/Pontos</th>
                        <th class="table-row-data">Data / Criação</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($exams as $exam)
                        <tr class="exams" data-url="{{ route('exams.show', ['id' => $exam['id']]) }}">
                            <td class="title">{{ $exam['title'] }}</td>
                            <td>{{ $exam['matter'] ?? 'N/A' }}</td>
                            <td class="table-row">{{ $exam['points'] }}</td>
                            <td class="table-row">{{ $exam['average'] }}</td>
                            <td class="table-row-data">{{ $exam['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </section>
@endsection
