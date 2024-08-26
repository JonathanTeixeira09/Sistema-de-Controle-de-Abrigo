@extends('layouts.app')

@section('title', 'Cadastrar Setor')
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
    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadsetor.post') }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="nome" class="form-label">Nome do Setor</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
                    placeholder="Administrativo" tabindex="1">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Cadastrar</button>
                </p>
            </div>
        </form>

        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <!--<th>Id</th>-->
                            <th style='text-align:right;'>Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setors as $setor)
                            <tr>
                                <td class='fw-bold'>{{ $setor->nome }}</td>
                                <!--<td data-title='Id'>{{-- $setor->id --}}</td>-->
                                <td data-title="Ações" style='text-align:right;'>
                                    <a href='{{ route('editsetor', $setor->id) }}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>
                                    <form action="{{ route('excluirsetor', $setor->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" value="excluir">Excluir</button>
                                    </form>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($setors) == 0)
                <p style="text-align: center;"> Não existe setores cadastrados no sistema</p>
            @endif
        </div>
    </div>
@endsection
