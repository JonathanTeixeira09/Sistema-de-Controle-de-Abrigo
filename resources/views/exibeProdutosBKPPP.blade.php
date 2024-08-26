@extends('layouts.app')

@section('title', 'Listagem de Produtos')
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
        <div class="p-2 flex-shrink-0 bd-highlight col-md-3 ms-auto">
            <button class="btn btn-success" id="btn-add">
                Adicionar Produto
            </button>
        </div>
        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade Mínima</th>
                            <th>Lote</th>
                            <th>Vencimento</th>
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr style='text-align:center;'>
                                <td class='fw-bold' style='text-align:left;'>{{ $produto->nome }}</td>
                                <td data-title='Descrição'>{{ $produto->descricao }}</td>
                                <td data-title='Quantidade Minima'>{{ $produto->qtdMin }}</td>
                                <td data-title='Lote'>{{ $produto->lote }}</td>
                                <td data-title='Vencimento'>{{ date('d/m/Y', strtotime($produto->vencimento)) }}</td>
                                <td data-titlel="Ações" style='text-align:right;'>

                                    <a href='{{ route('editproduto', $produto->id) }}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>

                                    <form action="{{ route('excluirproduto', $produto->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" value="excluir">Excluir</button>
                                    </form>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($produtos) == 0)
                <p style="text-align: center;"> Não existe produtos cadastrados no sistema</p>
            @endif
        </div>
        
@endsection
