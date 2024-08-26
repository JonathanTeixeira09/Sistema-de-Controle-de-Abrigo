@extends('layouts.app')

@section('title', 'Listagem de produtos no estoque')
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
        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Qtd Mínima</th>
                            <th>Quantidade</th>
                            <th>Lote</th>
                            <th>Validade</th>
                            <th>Categoria</th>
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr style='text-align:center;'
                                class="{{ $produto->quant <= $produto->qtdMin ? 'table-danger' : '' }}">
                                <td class='fw-bold' style='text-align:left;'>{{ $produto->nome }}</td>
                                <td data-title='Descrição'>{{ $produto->descricao }}</td>
                                <td data-title='qtd Minima'>{{ $produto->qtdMin }}</td>
                                <td data-title='Quantidade' ><span class="{{ $produto->quant <= $produto->qtdMin ? 'badge rounded-pill bg-danger' : '' }}">{{ $produto->quant }}</span></td>
                                <td data-title='Lote'>{{ $produto->lote }}</td>
                                <td data-title='Vencimento'>{{ date('d/m/Y', strtotime($produto->val)) }}</td>
                                <td data-title='Categoria'>{{ $produto->nomecat }}</td>
                                <td data-titlel="Ações" style='text-align:right;'>

                                    <a href='{{ route('editproduto', $produto->id) }}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>

                                    <form action="{{ route('excluirprodutoestoque', $produto->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" value="excluir">Excluir</button>
                                    </form>
                        @endforeach
                    </tbody>
                    <p></p>
                    <p></p>
                </div>
            </table>
            @if (count($produtos) == 0)
                <p style="text-align: center;"> Não existe produtos no ESTOQUE.</p>
            @endif
        </div>
@endsection
