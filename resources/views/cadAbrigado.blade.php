@extends('layouts.app')

@section('title', 'Cadastro de Abrigados')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadabrigado.post') }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome"
                    tabindex="1">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="nome_mae" class="form-label">Nome da Mãe</label>
                <input type="text" class="form-control" name="nome_mae" tabindex="2">
            </div>
            <div class="col-md-6">
                <label for="nome_pai" class="form-label">Nome Pai</label>
                <input type="text" class="form-control" name="nome_pai" tabindex="3">
            </div>

            <div class="col-md-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                    onkeypress="$(this).mask('000.000.000-00')" tabindex="4">
                @error('cpf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="genero" class="form-label">Gênero:</label>
                <select class="form-select" aria-label="Default select example" name="genero" tabindex="5">
                    <option selected>Selecione</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Prefiro não informar">Prefiro não informar</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="dataNasc" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control @error('dataNasc') is-invalid @enderror" name="dataNasc"
                    tabindex="6">
                @error('dataNasc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="dataEnt" class="form-label">Data Entrada</label>
                <input type="date" class="form-control @error('dataEnt') is-invalid @enderror" name="dataEnt" tabindex="7">
                @error('dataEnt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="idLoc" class="form-label">Local que o abrigado se encontra</label>
                <select class="form-select" name="idLoc" tabindex="8">
                    <option selected>Selecionar</option>
                    @foreach ($locals as $local)
                        <option value="{{ $local->id }}">
                            {{ $local->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-none">
                <label for="dataSai" class="form-label">Data Saída</label>
                <input type="date" class="form-control" name="dataSai" tabindex="9">
            </div>

            <div class="col-12">
                <label for="obs" class="form-label">Observações</label>
                <textarea class="form-control" name="obs" rows="3" placeholder="Descrição do Abrigado"
                    tabindex="10"></textarea>
            </div>
            <fieldset class="row g-2">
                <legend>Dados do Responsável</legend>

                <div class="col-12">
                    <label for="nome" class="form-label">Nome Responsável</label>
                    <input type="text" class="form-control" name="nome_resp" placeholder="Nome do Responsável"
                        tabindex="11">
                </div>

                <div class="col-md-3">
                    <label for="tipo" class="form-label">Tipo de Telefone</label>
                    <select class="form-select @error('tipo') is-invalid @enderror" name="tipo" tabindex="12">
                        <option value="Celular">Celular</option>
                        <option value="Residêncial">Residêncial</option>
                    </select>
                    @error('tipo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="codArea" class="form-label">DDD</label>
                    <input type="text" class="form-control" name="codArea" tabindex="13">
                </div>
                <div class="col-md-7">
                    <label for="numero" class="form-label">Telefone</label>
                    <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero"
                        onkeypress="$(this).mask('00000-0009')" tabindex="14">
                    @error('numero')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </fieldset>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar" tabindex="15">Cadastrar</button>
                </p>
            </div>
        </form>
    </div>
@endsection
