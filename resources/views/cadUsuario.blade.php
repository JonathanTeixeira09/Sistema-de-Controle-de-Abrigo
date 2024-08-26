@extends('layouts.app')

@section('title', 'Cadastro de Usuário')
@section('conteudo')


    <div class="col-md-6  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadastrar.post') }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="nome" class="form-label">Nome</label>
                <select class="form-select @error('id_pes') is-invalid @enderror" aria-label="Default select example"
                    name="nome" tabindex="1">
                    <option selected></option>
                    @foreach ($pessoas as $pessoa)
                        <option value="{{ $pessoa->id }}">
                            {{ $pessoa->nome }}
                        </option>
                    @endforeach
                </select>
                @error('id_pes')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="name@example.com" tabindex="2">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    tabindex="3">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="senha" class="form-label">Repete Senha</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password_confirmation" tabindex="4">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="setor" class="form-label">Setor</label>
                <select class="form-select" aria-label="Default select example" name="setor" tabindex="5">
                    <option selected>Selecione</option>
                    @foreach ($setors as $setor)
                        <option value="{{ $setor->id }}">
                            {{ $setor->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label for="nivelAcesso" class="form-label">Nivel de Acesso</label>
                <select class="form-select" aria-label="Default select example" name="nivelAcesso" tabindex="6">
                    <option selected>Selecione</option>
                    @foreach ($nivel_acessos as $nivelAcesso)
                        <option value="{{ $nivelAcesso->id }}">
                            {{ $nivelAcesso->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="login">Cadastrar</button>
                </p>
            </div>
        </form>
    </div>

@endsection
