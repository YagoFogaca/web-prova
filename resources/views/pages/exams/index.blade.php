@extends('layouts.platform.index')

@section('content')
    <section class="card-platform">
        <article class="d-flex justify-content-between align-items-center infos">
            <h4>Suas Provas</h4>
            <a class="btn btn-primary btn-bd-primary" href="{{ route('exams.create') }}">Criar prova</a>
        </article>

        <section class="container-exams display-table">
            <table>

                <tr>
                    <th class="title">Título</th>
                    <th>Matéria</th>
                    <th class="table-row">T/Pontos</th>
                    <th class="table-row">M/Pontos</th>
                    <th class="table-row">Data</th>
                    <th class="table-row">Editar</th>
                </tr>

                <tr>
                    <td class="title">Prova 2</td>
                    <td>Algoritmos</td>
                    <td class="table-row">10</td>
                    <td class="table-row">6</td>
                    <td class="table-row">10/09/2023</td>
                    <td class="table-row">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" style="cursor: pointer">Editar</a>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item btn-delete-contact">Deletar</button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

            </table>
        </section>
    </section>
@endsection
