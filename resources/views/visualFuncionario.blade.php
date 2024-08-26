@extends('layouts.app')

@section('title','Visualizar Voluntário')
@section('conteudo')

<style>
    @media (max-width: 767px){
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
    <div class="row">
        <div class="col-md-3 ms-auto">
            <a href='{{ route('exibefuncionarios.get') }}'><button type='button' class='btn btn-sm btn-primary'>Listar Todos</button></a>
            <a href='#'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
            <a href='#'><button type='button' class='btn btn-sm btn-danger'>Excluir</button></a><br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <b>Id:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->id }}
        </div>
        <div class="col-md-2">
            <b>Nome:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->nome }}
        </div>
        <div class="col-md-2">
            <b>Email:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->email }}
        </div>
        <div class="col-md-2">
            <b>Data Nascimento:</b>
        </div>
        <div class="col-md-10">
            {{ date('d/m/Y',strtotime($pessoas->dataNasc)) }}
        </div>
        <div class="col-md-2">
            <b>Gênero:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->genero }}
        </div>
        <div class="col-md-2">
            <b>CPF:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->cpf }}
        </div>
        <div class="col-md-2">
            <b>Tipo de Formação:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->forma }}
        </div>
        <div class="col-md-2">
            <b>Status Formação:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->status }}
        </div>
        <div class="col-md-2">
            <b>Nome da Formação:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->nomeform }}
        </div>
        <div class="col-md-2">
            <b>Data de Entrada:</b>
        </div>
        <div class="col-md-10">
            {{ date('d/m/Y',strtotime($pessoas->dataEnt)) }}
        </div>
        <div class="col-md-2">
            <b>Data Saída:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->dataSai != NULL ? "date('d/m/Y',strtotime($pessoas->dataSai))" : "" }}
        </div>
        <div class="col-md-2">
            <b>Função:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->nomeFunc }}
        </div>
        <div class="col-md-2">
            <b>Tipo de Telefone:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->tipotel }}
        </div>
        <div class="col-md-2">
            <b>Código de Área:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->cod }}
        </div>
        <div class="col-md-2">
            <b>Telefone:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->telefone }}
        </div>
        <div class="col-md-2">
            <b>Tipo Logradouro:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->tipoLog }}
        </div>
        <div class="col-md-2">
            <b>Nome Logradouro:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->log }}
        </div>
        <div class="col-md-2">
            <b>Número:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->nrEnd }}
        </div>
        <div class="col-md-2">
            <b>Complemento:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->compl }}
        </div>
        <div class="col-md-2">
            <b>CEP:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->cep }}
        </div>
        <div class="col-md-2">
            <b>Bairro:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->bairro }}
        </div>
        <div class="col-md-2">
            <b>Cidade:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->cidade }}
        </div>
        <div class="col-md-2">
            <b>Estado:</b>
        </div>
        <div class="col-md-10">
            {{ $pessoas->estado }}
        </div>
        <p></p>

    </div>

@endsection