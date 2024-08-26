@extends('layouts.app')

@section('title', 'Listagem de Abrigados')
@section('conteudo')

    <style>
        @media (max-width: 767px) {
            .table thead {
                display: none;
            }

            .table td {
                display: flex;
                justify-content: space-between;
            }

            .table tr {
                display: block;
            }

            .table td:first-of-type {
                font-weight: bold;
                font-size: 1.2rem;
                text-align: center;
                display: block;
            }

            .table td:not(:first-of-type):before {
                content: attr(data-title);
                display: block;
                font-weight: bold;
            }
        }

    </style>
    <div class="col-md-12  mx-auto justify-content-center align-items-center flex-column">
        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Nome</th>
                            <th>Data Entrada</th>
                            <th>Local</th>
                            <th>Data Nascimento</th>
                            <th>Responsável</th>
                            <th>CPF</th>
                            <th>Data Saída</th>
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abrigados as $abrigado)
                            <tr style='text-align:center;'>
                                <td class='fw-bold' style='text-align:left;'>{{ $abrigado->nome }}</td>
                                <td data-title='Data Entrada'>{{ date('d/m/Y', strtotime($abrigado->dataEnt)) }}</td>
                                <td data-title='Local'>{{ $abrigado->local }}</td>
                                <td data-title='Data Nascimento'>{{ date('d/m/Y', strtotime($abrigado->dataNasc)) }}</td>
                                <td data-title='Responsável'> {{ $abrigado->nome_resp }}</td>
                                <td data-title='CPF'>{{ $abrigado->cpf }}</td>
                                <td data-title='Data Saída'>{{ $abrigado->dataSai != NULL ? "date('d/m/Y',strtotime($abrigado->dataSai))" : "" }}</td>
                                <td data-titlel="Ações" style='text-align:right;'>

                                    <a href='{{ route('visualAbrigado', $abrigado->id) }}'>
                                        <img src="{{ URL::to('img/icons/visibility_white.svg') }}" width="32" height="32"
                                            class="mb-1 btn btn-sm btn-primary text-white">
                                    </a>

                                    <a href='{{ route('editabrigado', $abrigado->id) }}'>
                                        <img src="{{ URL::to('img/icons/edit_white.svg') }}" width="32" height="32"
                                            class="mb-1 btn btn-sm btn-warning text-white">
                                    </a>

                                    <form action="{{ route('excluirabrigado', $abrigado->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <img src="{{ URL::to('img/icons/delete_white.svg') }}" width="32" height="32"
                                            class="mb-1 btn btn-sm btn-danger text-white" type="submit">
                                    </form>
                                </td>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($abrigados) == 0)
                <p style="text-align: center;"> Não existe abrigados cadastrados no sistema</p>
            @endif
        </div>
    </div>
@endsection
