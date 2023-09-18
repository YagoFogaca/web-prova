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
                        <th class="table-row">Data</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="exams" data-url='exams.show'>
                        <td class="title">Prova 1</td>
                        <td>Algoritmos</td>
                        <td class="table-row">10</td>
                        <td class="table-row">6</td>
                        <td class="table-row">05/09/2023</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
@endsection
