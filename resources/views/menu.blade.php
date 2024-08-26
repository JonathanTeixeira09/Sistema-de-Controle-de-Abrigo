<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="{{ URL::to('img/logo.png') }}" alt="Inicio" width="180" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('/') }}">
                        <img src="{{ URL::to('img/icons/home.svg') }}" width="20" height="20" class="mb-1">
                        Inicio
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ URL::to('img/icons/usuario.svg') }}" width="20" height="20" class="mb-1">
                        Cadastro
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="{{ route('exibeabrigado.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20" class="mb-1">
                                Listagem de Abrigados</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('exibeusuarios.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20" class="mb-1">
                                Listagem de Usuários</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('exibefuncionarios.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem de Voluntários</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadastrar.get') }}"><img
                                    src="{{ URL::to('img/icons/people_m.svg') }}" width="20" height="20"
                                    class="mb-1"> Usuário</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadfuncionario.get') }}"><img
                                    src="{{ URL::to('img/icons/people_m.svg') }}" width="20" height="20"
                                    class="mb-1"> Funcionário</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadabrigado.get') }}"><img
                                    src="{{ URL::to('img/icons/people_m.svg') }}" width="20" height="20"
                                    class="mb-1"> Abrigado</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadfuncao.get') }}"><img
                                    src="{{ URL::to('img/icons/produtos2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Função</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadlocal.get') }}"><img
                            src="{{ URL::to('img/icons/produtos2.svg') }}" width="20" height="20"
                            class="mb-1"> Cadastrar Local</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadnivel.get') }}"><img
                                    src="{{ URL::to('img/icons/produtos2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Nivel Acesso</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadsetor.get') }}"><img
                            src="{{ URL::to('img/icons/produtos2.svg') }}" width="20" height="20"
                            class="mb-1"> Cadastrar Setor</a></li>
                        <li><a class="dropdown-item text-white disabled" href="#"><img
                                    src="{{ URL::to('img/icons/people_m.svg') }}" width="20" height="20"
                                    class="mb-1"> Ativar Usuário</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ URL::to('img/icons/estoque.svg') }}" width="20" height="20" class="mb-1">
                        Produtos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="{{ route('exibeprodutos.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem de Produtos</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadproduto.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Produtos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadunidade.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Apresentação</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadastrarcat.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Categoria</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ URL::to('img/icons/fornecedor.svg') }}" width="20" height="20" class="mb-1">
                        Fornecedores
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="{{ route('exibefornecedor.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem de Fornecedores</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadfornecedor.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Fornecedores</a></li>
                        <!--<li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-white" href="#"><img src="{{-- URL::to('img/icons/fornecedor.svg') --}}" width="20" height="20" class="mb-1"> Ativar Fornecedor</a></li>-->
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ URL::to('img/icons/nota_prod.svg') }}" width="20" height="20" class="mb-1">
                        Nota Fiscal
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="{{ route('exibenotafiscal.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadnotafiscal.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Nota Fiscal</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ URL::to('img/icons/store_pedido.svg') }}" width="20" height="20" class="mb-1">
                        Pedido
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem de Pedidos</a></li>
                        <li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/produtos2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Pedido</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/listagem.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem de Itens</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('exibeestoque.get') }}">Estoque</a>
                </li>


            </ul>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ URL::to('img/logo2.png') }}" alt="usuario" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>{{ Auth::user()->email }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <!--<li><a class="dropdown-item text-white" href="#">Perfil</a></li>-->
                    <li><a class="dropdown-item text-white" href="{{ route('editusuario', Auth::user()->id) }}">Editar Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-white" href="{{ route('logout') }}">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
