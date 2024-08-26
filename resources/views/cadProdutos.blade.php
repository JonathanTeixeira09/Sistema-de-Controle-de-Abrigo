@extends('layouts.app')

@section('title', 'Cadastro de Produtos')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadproduto.post') }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-5">
                <label for="nome" class="form-label">Nome Produto</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
                    placeholder="Nome Produto" tabindex="1">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-7">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="descricao" placeholder="Descrição do produto" tabindex="2">
            </div>

            <div class="col-md-4">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" tabindex="3" required>
                    <option selected>Selecione</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="apresentacao" class="form-label">Apresentação</label>
                <select class="form-select" name="apresentacao" tabindex="4" required>
                    <option selected>Selecione</option>
                    @foreach ($uni_meds as $uniMed)
                        <option value="{{ $uniMed->id }}">
                            {{ $uniMed->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="qtdMin" class="form-label">Quantidade Mínima</label>
                <input type="number" class="form-control @error('qtdMin') is-invalid @enderror" name="qtdMin" tabindex="5">
                @error('qtdMin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="dataVal" class="form-label">Data Validade</label>
                <input type="text" class="form-control" name="dataVal" onkeypress="$(this).mask('00/00/0000')" tabindex="6">
            </div>
            <div class="col-md-4">
                <label for="lote" class="form-label">Lote</label>
                <input type="text" class="form-control" name="lote" tabindex="7">
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Cadastrar</button>
                </p>
            </div>

        </form>
    </div>

@endsection
