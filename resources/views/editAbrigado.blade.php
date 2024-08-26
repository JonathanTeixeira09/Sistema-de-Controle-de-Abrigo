@extends('layouts.app')

@section('title', 'Editar Abrigado')
@section('conteudo')
    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('updateabrigado', $abrigados->id) }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-12">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome"
                    tabindex="1" value="{{ $abrigados->nome }}">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="nome_mae" class="form-label">Nome da Mãe</label>
                <input type="text" class="form-control" name="nome_mae" tabindex="2" value="{{ $abrigados->nome_mae }}">
            </div>
            <div class="col-md-6">
                <label for="nome_pai" class="form-label">Nome Pai</label>
                <input type="text" class="form-control" name="nome_pai" tabindex="3" value="{{ $abrigados->nome_pai }}">
            </div>

            <div class="col-md-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                    onkeypress="$(this).mask('000.000.000-00')" tabindex="4" value="{{ $abrigados->cpf }}">
                @error('cpf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="genero" class="form-label">Gênero:</label>
                <select class="form-select" aria-label="Default select example" name="genero" tabindex="5">
                    <option value="Feminino" {{$abrigados->genero ==  'Feminino'  ? "selected='selected" : "" }}>Feminino</option>
                    <option value="Masculino" {{$abrigados->genero ==  'Masculino'  ? "selected='selected" : "" }}>Masculino</option>
                    <option value="Prefiro não informar" {{$abrigados->genero ==  'Prefiro não informar'  ? "selected='selected" : "" }}>Prefiro não informar</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="dataNasc" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control @error('dataNasc') is-invalid @enderror" name="dataNasc" tabindex="6"
                    value="{{ $abrigados->dataNasc }}">
                @error('dataNasc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="dataEnt" class="form-label">Data Entrada</label>
                <input type="date" class="form-control @error('dataEnt') is-invalid @enderror" name="dataEnt" tabindex="7"
                    value="{{ $abrigados->dataEnt }}">
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
                        <option value="{{ $local->id }}" {{$abrigados->idLoc ==  $local->id  ? "selected='selected" : "" }}>
                            {{ $local->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-none">
                <label for="dataSai" class="form-label">Data Saída</label>
                <input type="date" class="form-control" name="dataSai" tabindex="9" value="{{ $abrigados->dataSai }}">
            </div>

            <div class="col-12">
                <label for="obs" class="form-label">Observações</label>
                <textarea class="form-control" name="obs" rows="3" placeholder="Descrição do Abrigado"
                    tabindex="10">{{ $abrigados->obs }}</textarea>
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Editar</button>
                </p>
            </div>
        </form>
    </div>
@endsection
