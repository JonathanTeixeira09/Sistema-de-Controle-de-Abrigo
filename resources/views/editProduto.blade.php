@extends('layouts.app')

@section('title','Edita Produto')
@section('conteudo')

        <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">
            <form class="row g-2" action="{{ route('updateproduto', $produtos->id) }}" method="POST" name="formCadastro" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-5">
                    <label for="nome" class="form-label">Nome Produto</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome Produto" tabindex="1" value="{{ $produtos->nome }}">
                    @error('nome')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-7">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição do produto" tabindex="2" value="{{ $produtos->descricao }}">
                </div>

                <div class="col-md-4">
                <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição do produto" tabindex="2" value="{{ $produtos->descricao }}">
                </div>
                <div class="col-md-4">
                <label for="id_uni" class="form-label">Apresentação</label>
                    <select class="form-select" name="id_uni" tabindex="4">
                        @foreach($uni_meds as $uniMed)
                        <option value="{{ $uniMed->id }}" {{$produtos->id_uni ==  $uniMed->id  ? "selected='selected" : "" }}>
                            {{ $uniMed->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="qtdMin" class="form-label">Quantidade Mínima</label>
                    <input type="number" class="form-control @error('nome') is-invalid @enderror" name="qtdMin" tabindex="5" value="{{ $produtos->qtdMin }}">
                    @error('qtdMin')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="vencimento" class="form-label">Data Validade</label>
                    <input type="date" class="form-control" name="vencimento" tabindex="6" value="{{ $produtos->vencimento }}">
                </div>
                <div class="col-md-4">
                    <label for="lote" class="form-label">Lote</label>
                    <input type="text" class="form-control" name="lote" tabindex="7" value="{{ $produtos->lote }}">
                </div>

                <div class="col-12">
                    <p style="text-align: right;">
                        <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Editar</button>
                    </p>
                </div>

            </form>
        </div>
@endsection