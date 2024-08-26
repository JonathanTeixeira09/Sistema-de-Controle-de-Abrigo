@extends('layouts.app')

@section('title', 'Listagem de Usuários')
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
    <div class="col-md-10  mx-auto justify-content-center align-items-center flex-column">
        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Setor</th>
                            <th>Nivel de Acesso</th>
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr style='text-align:center;'>
                                <td class='fw-bold' style='text-align:left;'>{{ $user->nome }}</td>
                                <td data-title='Email'>{{ $user->email }}</td>
                                <td data-title='Setor'>{{ $user->setnome }}</td>
                                <td data-title='Nivel de Acesso'>{{ $user->nomeniv }}</td>
                                <td data-titlel="Ações" style='text-align:right;'>

                                    <a href='{{ route('editusuario', $user->id) }}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>

                                    <form action="{{ route('excluirusuario', $user->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" value="excluir">Excluir</button>
                                    </form>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($users) == 0)
                <p style="text-align: center;"> Não existe usuários cadastrados no sistema</p>
            @endif
        </div>
    </div>
@endsection
