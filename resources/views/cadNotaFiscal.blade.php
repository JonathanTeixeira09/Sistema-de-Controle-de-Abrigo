@extends('layouts.app')

@section('title','Cadastrar número da Nota Fiscal')
@section('conteudo')

<div class="col-md-4  mx-auto justify-content-center align-items-center flex-column">
    <form class="row g-2" action="{{ route('cadnotafiscal.post') }}" method="POST" name="formCadastro" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="nrNotaFiscal" class="form-label">Número Nota Fiscal</label>
            <input type="text" class="form-control @error('nrNotaFiscal') is-invalid @enderror" name="nrNotaFiscal"  tabindex="1">
            @error('nrNotaFiscal')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="dataCompra" class="form-label">Data Nota Fiscal</label>
            <input type="date" class="form-control @error('dataCompra') is-invalid @enderror" name="dataCompra" tabindex="2">
            @error('dataCompra')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="id_forn" class="form-label">Nome do Fornecedor</label>
                <select class="form-select" name="id_forn" tabindex="3" required>
                    <option selected>Selecione</option>
                    @foreach ($fornecedors as $fornecedor)
                        <option value="{{ $fornecedor->id }}">
                            {{ $fornecedor->razaoSocial }}
                        </option>
                    @endforeach
                </select>
        </div>
        
        <div class="col-12">
            <p style="text-align: right;">
                <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Cadastrar</button>
            </p>
        </div>
    </form>
</div>
@endsection