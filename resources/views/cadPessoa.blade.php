@extends('layouts.app')

@section('title', 'Cadastro de Funcionário')
@section('conteudo')

    <div class="col-md-8 mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadfuncionario.post') }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder=""
                    tabindex="1">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="dataNasc" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" name="dataNasc" tabindex="2">
            </div>
            <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" tabindex="3"
                    onkeypress="$(this).mask('000.000.000-00')">
                @error('cpf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="dataEnt" class="form-label">Data Admissão</label>
                <input type="date" class="form-control @error('dataEnt') is-invalid @enderror" name="dataEnt" tabindex="4">
                @error('dataEnt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="genero" class="form-label">Gênero:</label>
                <select class="form-select" aria-label="Default select example" name="genero" tabindex="5">
                    <option selected>Selecione</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Prefiro não informar">Prefiro não informar</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="id_func" class="form-label">Função</label>
                <select class="form-select" name="id_func" tabindex="6">
                    <option selected>Selecionar</option>
                    @foreach ($funcaos as $funcao)
                        <option value="{{ $funcao->id }}">
                            {{ $funcao->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="dataSai" class="form-label">Data Saída</label>
                <input type="date" class="form-control" name="dataSai" tabindex="7">
            </div>

            <div class="col-md-4">
                <label for="formacao" class="form-label">Formação</label>
                <select class="form-select" name="formacao" tabindex="8">
                    <option selected>Selecionar</option>
                    <option value="Ensino Fundamental">Ensino Fundamental</option>
                    <option value="Ensino Médio">Ensino Médio</option>
                    <option value="Ensino Superior">Ensino Superior</option>
                    <option value="Técnico">Técnico</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="statusform" class="form-label">Status Curso</label>
                <select class="form-select" name="statusform" tabindex="9">
                    <option selected>Selecionar</option>
                    <option value="Concluído">Concluído</option>
                    <option value="Em Andamento">Em Andamento</option>
                    <option value="Incompleto">Incompleto</option>
                </select>
            </div>
            <div class="col-md-5">
                <label for="nomeform" class="form-label">Curso</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="nomeform" tabindex="10">
                @error('nomeform')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-md-2">
                <label for="tipo" class="form-label">Tipo de Telefone</label>
                <select class="form-select" name="tipo" tabindex="11">
                    <option value="Celular">Celular</option>
                    <option value="Residêncial">Residêncial</option>
                </select>
            </div>
            <div class="col-md-1">
                <label for="codArea" class="form-label">DDD</label>
                <input type="text" class="form-control" name="codArea" tabindex="12">
            </div>
            <div class="col-md-3">
                <label for="numero" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="numero" onkeypress="$(this).mask('00000-0009')" tabindex="13">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="name@example.com" tabindex="14">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <fieldset class="row g-2">
                <legend>Endereço</legend>

                <div class="col-md-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input name="cep" type="text" class="form-control" tabindex="15" size="10" maxlength="9">
                </div>
                <div class="col-md-2">
                    <label for="tipoLog" class="form-label">Tipo</label>
                    <select class="form-select" name="tipoLog" tabindex="16">
                        <option value="">Selecionar</option>
                        <option value="Aeroporto"> Aeroporto </option>
                        <option value="Alameda"> Alameda </option>
                        <option value="Área"> Área </option>
                        <option value="Avenida"> Avenida </option>
                        <option value="Chácara"> Chácara </option>
                        <option value="Colônia"> Colônia </option>
                        <option value="Condomínio"> Condomínio </option>
                        <option value="Conjunto"> Conjunto </option>
                        <option value="Distrito"> Distrito </option>
                        <option value="Esplanada"> Esplanada </option>
                        <option value="Estação"> Estação </option>
                        <option value="Estrada"> Estrada </option>
                        <option value="Favela"> Favela </option>
                        <option value="Fazenda"> Fazenda </option>
                        <option value="Feira"> Feira </option>
                        <option value="Jardim"> Jardim </option>
                        <option value="Ladeira"> Ladeira </option>
                        <option value="Lago"> Lago </option>
                        <option value="Lagoa"> Lagoa </option>
                        <option value="Largo"> Largo </option>
                        <option value="Loteamento"> Loteamento </option>
                        <option value="Morro"> Morro </option>
                        <option value="Núcleo"> Núcleo </option>
                        <option value="Parque"> Parque </option>
                        <option value="Passarela"> Passarela </option>
                        <option value="Pátio"> Pátio </option>
                        <option value="Praça"> Praça </option>
                        <option value="Quadra"> Quadra </option>
                        <option value="Recanto"> Recanto </option>
                        <option value="Residencial"> Residencial </option>
                        <option value="Rodovia"> Rodovia </option>
                        <option value="Rua"> Rua </option>
                        <option value="Setor"> Setor </option>
                        <option value="Sítio"> Sítio </option>
                        <option value="Travessa"> Travessa </option>
                        <option value="Trecho"> Trecho </option>
                        <option value="Trevo"> Trevo </option>
                        <option value="Via"> Via </option>
                        <option value="Viaduto"> Viaduto </option>
                        <option value="Viela"> Viela </option>
                        <option value="Vila"> Vila </option>
                    </select>
                </div>
                <div class="col-md-7">
                    <label for="nomelog" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" name="nomeLog" tabindex="17">
                </div>

                <div class="col-md-4">
                    <label for="nrEnd" class="form-label">Número</label>
                    <input type="text" class="form-control" name="nrEnd" tabindex="18">
                </div>
                <div class="col-md-8">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complEnd" placeholder="Apto, Casa" tabindex="19">
                </div>

                <div class="col-md-5">
                    <label for="id_bai" class="form-label">Bairro</label>
                    <select class="form-select" name="id_bai" tabindex="20">
                        <option selected></option>
                        @foreach ($bairros as $bairro)
                            <option value="{{ $bairro->id }}">
                                {{ $bairro->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="id_cid" class="form-label">Cidade</label>
                    <select class="form-select" name="id_cid" tabindex="21">
                        <option selected></option>
                        @foreach ($cidades as $cidade)
                            <option value="{{ $cidade->id }}">
                                {{ $cidade->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="id_est" class="form-label">Estado</label>
                    <select class="form-select" name="id_est" tabindex="22">
                        <option selected></option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}">
                                {{ $estado->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </fieldset>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Cadastrar</button>
                </p>
            </div>
        </form>
    </div>

@endsection
