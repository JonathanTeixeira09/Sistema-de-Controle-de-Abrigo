@extends('layouts.app')

@section('title', 'Editar dados do Fornecedor')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">
        <form class="row g-2" action="{{ route('updatefornecedor', $fornecedors->id) }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="razaoSocial" class="form-label">Nome Fornecedor</label>
                <input type="text" class="form-control @error('razaoSocial') is-invalid @enderror" name="razaoSocial"
                    placeholder="Razão Social" tabindex="1" value="{{ $fornecedors->nome }}">
                @error('razaoSocial')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" tabindex="2"
                    onkeypress="$(this).mask('00.000.000/0000-00')" value="{{ $fornecedors->cnpj }}">
                @error('cnpj')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="tipo" class="form-label">Tipo de Telefone</label>
                <select class="form-select @error('tipo') is-invalid @enderror" name="tipo" tabindex="3">
                    <option value="Celular">Celular</option>
                    <option value="Residêncial" {{ $fornecedors->tipo == 'Residêncial' ? "selected='selected" : '' }}>
                        Residêncial</option>
                </select>
                @error('tipo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-1">
                <label for="codArea" class="form-label">DDD</label>
                <input type="text" class="form-control" name="codArea" tabindex="4" value="{{ $fornecedors->cod }}">
            </div>
            <div class="col-md-4">
                <label for="numero" class="form-label">Telefone</label>
                <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero"
                    onkeypress="$(this).mask('00000-0009')" tabindex="5" value="{{ $fornecedors->telefone }}">
                @error('numero')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <input type="hidden" name="id_tel" value="{{ $fornecedors->idtel }}">

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Salvar</button>
                </p>
            </div>
        </form>
    </div>
@endsection
