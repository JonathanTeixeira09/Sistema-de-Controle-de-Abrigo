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
            <a href='{{ route('cadproduto.get') }}'><button type='button'
                class='btn btn-success'>Adicionar Produto</button></a>
                <!--<button class="btn btn-success" id="btn-add"> 
                    Adicionar Produto
                </button>-->
        </div>
        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Nome</th>
                            <!--<th>Id</th>-->
                            <th>Descrição</th>
                            <th>Quantidade Mínima</th>
                            <th>Lote</th>
                            <th>Vencimento</th>
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="todos-list" name="todos-list">
                        @foreach ($produtos as $data)
                            <tr style='text-align:center;' id="todo{{$data->id}}">
                                <td class='fw-bold' style='text-align:left;'>{{ $data->nome }}</td>
                                <!--<td data-title='Id'>{{-- $data->id --}}</td>-->
                                <td data-title='Descrição'>{{ $data->descricao }}</td>
                                <td data-title='Quantidade Minima'>{{ $data->qtdMin }}</td>
                                <td data-title='Lote'>{{ $data->lote }}</td>
                                <td data-title='Vencimento'>{{ date('d/m/Y', strtotime($data->vencimento)) }}</td>
                                <td data-titlel="Ações" style='text-align:right;'>

                                    <a href='{{ route('editproduto', $data->id) }}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>

                                    <form action="{{ route('excluirproduto', $data->id) }}" method="post"
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
        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Cadastrar Produto</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                            <div class="alert alert-danger d-none messageBox" role="alert">

                            </div>
                            <div class="form-group">
                                <label for="nome" class="form-label">Nome Produto</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome"
                                    placeholder="Nome Produto" tabindex="1">
                            </div>
                            <div class="form-group">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do produto" tabindex="2">
                            </div>
                            <div class="form-group">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select class="form-select" name="id_cat" id="id_cat" tabindex="3" required>
                                    <option selected>Selecione</option>
                                    {{--@foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="apresentacao" class="form-label">Apresentação</label>
                                <select class="form-select" name="id_uni" id="id_uni" tabindex="4" required>
                                    <option selected>Selecione</option>
                                    {{--@foreach ($uni_meds as $uniMed)
                                        <option value="{{ $uniMed->id }}">
                                            {{ $uniMed->nome }}
                                        </option>
                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qtdMin" class="form-label">Quantidade Mínima</label>
                                <input type="number" class="form-control @error('qtdMin') is-invalid @enderror" name="qtdMin" id="qtdMin" tabindex="5">
                                @error('qtdMin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dataVal" class="form-label">Data Validade</label>
                                <input type="date" class="form-control" name="vencimento" id="vencimento" tabindex="6">
                            </div>
                            <div class="form-group">
                                <label for="lote" class="form-label">Lote</label>
                                <input type="text" class="form-control" name="lote" id="lote" tabindex="7">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="todo_id" name="todo_id" value="0">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Adicionar
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>


@endsection
