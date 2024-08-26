@extends('layouts.app')

@section('title', 'Listagem de Notas Fiscais')
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
        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Número Nota Fiscal</th>
                            <th>Data Compra</th>
                            <th>Fornecedor</th>
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody style='text-align:center;'>
                        @foreach ($compras as $compra)
                            <tr>
                                <td class='fw-bold'>{{ $compra->nrNota }}</td>
                                <td data-title='Data Compra'>{{ date('d/m/Y', strtotime($compra->dataCompra)) }}</td>
                                <td data-title='Fornecedor'>{{ $compra->nomeFon }}</td>
                                <td data-title="Ações" style='text-align:right;'>
                                    <a href='{{ route('editfornecedor', $compra->id) }}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>

                                    <form action="{{ route('excluirfornecedor', $compra->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" value="excluir">Excluir</button>
                                    </form>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($compras) == 0)
                <p style="text-align: center;"> Não existe notas cadastradas no sistema</p>
            @endif
        </div>
    </div>
@endsection
