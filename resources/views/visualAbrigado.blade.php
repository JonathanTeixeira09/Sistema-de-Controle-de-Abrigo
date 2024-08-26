@extends('layouts.app')

@section('title','Visualizar Abrigado')
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
            <a href='{{ route('exibeabrigado.get') }}'><button type='button' class='btn btn-sm btn-primary'>Listar Todos</button></a>
            <a href='#'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
            <a href='#'><button type='button' class='btn btn-sm btn-danger'>Excluir</button></a><br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <b>Id:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->id }}
        </div>
        <div class="col-md-2">
            <b>Nome:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->nome }}
        </div>
        <div class="col-md-2">
            <b>Nome da Mãe:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->nome_mae }}
        </div>
        <div class="col-md-2">
            <b>Nome da Pai:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->nome_pai }}
        </div>
        <div class="col-md-2">
            <b>CPF:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->cpf }}
        </div>
        <div class="col-md-2">
            <b>Gênero:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->genero }}
        </div>
        <div class="col-md-2">
            <b>Data Nascimento:</b>
        </div>
        <div class="col-md-10">
            {{ date('d/m/Y',strtotime($abrigados->dataNasc)) }}
        </div>
        <div class="col-md-2">
            <b>Data de Entrada:</b>
        </div>
        <div class="col-md-10">
            {{ date('d/m/Y',strtotime($abrigados->dataEnt)) }}
        </div>
        <div class="col-md-2">
            <b>Data Saída:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->dataSai != NULL ? "date('d/m/Y',strtotime($abrigados->dataSai))" : "" }}
        </div>
        <div class="col-md-2">
            <b>Local abrigado encontra-se:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->local }}
        </div>
        <div class="col-md-2">
            <b>Observações:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->obs }}
        </div>
        <div class="col-md-2">
            <b>Nome do Responsável:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->nome_resp }}
        </div>
        <div class="col-md-2">
            <b>Tipo de Telefone:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->tipotel }}
        </div>
        <div class="col-md-2">
            <b>Código de Área:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->cod }}
        </div>
        <div class="col-md-2">
            <b>Telefone:</b>
        </div>
        <div class="col-md-10">
            {{ $abrigados->telefone }}
        </div>
       
    </div>

@endsection