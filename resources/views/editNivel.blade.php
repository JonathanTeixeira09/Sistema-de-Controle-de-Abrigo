@extends('layouts.app')

@section('title','Editar nível de acesso ao sistema')
@section('conteudo')

        <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

            <form class="row g-2" action="{{ route('updatenivelacesso', $nivel_acessos->id) }}" method="POST" name="formCadastro" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label for="nome" class="form-label">Nome do Nível de Acesso</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Administrador" tabindex="1" value="{{ $nivel_acessos->nome }}">
                    @error('nome')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                

                <div class="col-12">
                    <p style="text-align: right;">
                        <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Salvar</button>
                    </p>
                </div>
            </form>
        </div>
@endsection