@extends('layouts.app')

@section('title', 'Listagem de Voluntários')
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
                            <th>Data Nascimento</th>
                            <th>Email</th>
                            <th>Cod Area</th>
                            <th>Telefone</th>
                            <th style='text-align:center;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody style='text-align:center;'>
                        @foreach ($pessoas as $pessoa)
                            <tr>
                                <td class='fw-bold' style='text-align:left;'>{{ $pessoa->nome }}</td>
                                <td data-title='Data Nascimento'>{{ date('d/m/Y', strtotime($pessoa->dataNasc)) }}</td>
                                <td data-title='Email'>{{ $pessoa->email }}</td>
                                <td data-title='Cod Area'>{{ $pessoa->cod }}</td>
                                <td data-title='Telefone'>{{ $pessoa->telefone }}</td>
                                <td data-title="Ações" style='text-align:center;'>

                                    <a href='{{ route('visualfuncionario', $pessoa->id) }}'>
                                        <img src="{{ URL::to('img/icons/visibility_white.svg') }}" width="32" height="32"
                                            class="mb-1 btn btn-sm btn-primary text-white">
                                    </a>

                                    <a href='{{-- route('editpessoa', $pessoa->id) --}}'>
                                        <img src="{{ URL::to('img/icons/edit_white.svg') }}" width="32" height="32"
                                            class="mb-1 btn btn-sm btn-warning text-white">
                                    </a>

                                    <form action="{{-- route('excluirpessoa', $pessoa->id) --}}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <img src="{{ URL::to('img/icons/delete_white.svg') }}" width="32" height="32"
                                            class="mb-1 btn btn-sm btn-danger text-white" type="submit">
                                    </form>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($pessoas) == 0)
                <p style="text-align: center;"> Não existe voluntários cadastrados no sistema</p>
            @endif
        </div>

    </div>
@endsection
