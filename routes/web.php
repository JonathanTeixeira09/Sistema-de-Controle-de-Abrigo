<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastrarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ExibirController;
use App\Http\Controllers\ExcluirController;
use App\Http\Controllers\EditController;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/', function () {
    return view('inicio');
})->name('home')->middleware('auth');*/

Route::get('/', [HomeController::class, 'exibirPaginaInicial'])->name('/')->middleware('auth');

//Rota que exibe o formulário de cadastro de Usuários
Route::get(
    '/cadastrar', [CadastrarController::class, 'exibeCadastroUsuario']
    )->name('cadastrar.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Usuários
Route::post(
    '/cadastrar', [CadastrarController::class, 'cadastraUsuario']
    )->name('cadastrar.post')->middleware('auth');

//Rota que exibe o formulário de cadastro de Categorias
Route::get(
    '/cadastrarcat', [CadastrarController::class, 'exibeCadastroCategoria']
    )->name('cadastrarcat.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Categorias
Route::post(
    '/cadastrarcat', [CadastrarController::class, 'cadastrarCategoria']
    )->name('cadastrarcat.post')->middleware('auth');

//Rota que exibe o formulário de cadastro de Apresentação
Route::get(
    '/cadunidade', [CadastrarController::class, 'exibeCadastroUniMed']
    )->name('cadunidade.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Apresentação
Route::post(
    '/cadunidade', [CadastrarController::class, 'cadastrarUniMed']
    )->name('cadunidade.post')->middleware('auth');


//Rota que exibe o formulário de cadastro de Produtos
Route::get(
    '/cadproduto',
    [CadastrarController::class, 'exibeCadProduto']
    )->name('cadproduto.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Produtos
Route::post(
    '/cadproduto',
    [CadastrarController::class, 'cadastrarProduto']
    )->name('cadproduto.post')->middleware('auth');

//Route::resource('produto', CadastrarController::class);



//Rota que exibe o formulário de cadastro de Nota Fiscal
Route::get(
    '/cadnotafiscal',
    [CadastrarController::class, 'exibeCadNotaFiscal']
    )->name('cadnotafiscal.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Nota Fiscal
Route::post(
    '/cadnotafiscal',
    [CadastrarController::class, 'cadastrarNotaFiscal']
    )->name('cadnotafiscal.post')->middleware('auth');





//Rota que exibe o formulário de cadastro de Níveis de Acessos
Route::get(
    '/cadnivel',
    [CadastrarController::class, 'exibeCadNivelAcesso']
    )->name('cadnivel.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Níveis de Acessos
Route::post(
    '/cadnivel',
    [CadastrarController::class, 'cadastrarNivelAcesso']
    )->name('cadnivel.post')->middleware('auth');

//Rota que exibe o formulário de cadastro de Setor
Route::get(
    '/cadsetor',
    [CadastrarController::class, 'exibeCadSetor']
    )->name('cadsetor.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Setor
Route::post(
    '/cadsetor',
    [CadastrarController::class, 'cadastrarSetor']
    )->name('cadsetor.post')->middleware('auth');

//Rota que exibe o formulário de cadastro de Local
Route::get(
    '/cadlocal',
    [CadastrarController::class, 'exibeCadLocal']
    )->name('cadlocal.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Local
Route::post(
    '/cadlocal',
    [CadastrarController::class, 'cadastrarLocal']
    )->name('cadlocal.post')->middleware('auth');

//Rota que exibe o formulário de cadastro dos Abrigados
Route::get(
    '/cadabrigado',
    [CadastrarController::class, 'exibeCadAbrigado']
    )->name('cadabrigado.get')->middleware('auth');

//Rota que processa o formulário de cadastro dos Abrigados
Route::post(
    '/cadabrigado',
    [CadastrarController::class, 'cadastrarAbrigado']
    )->name('cadabrigado.post')->middleware('auth');


//Rota que exibe o formulário de cadastro dos Funcionários
Route::get(
    '/cadfuncionario',
    [CadastrarController::class, 'exibeCadFuncionario']
    )->name('cadfuncionario.get')->middleware('auth');

//Rota que processa o formulário de cadastro dos Funcionários
Route::post(
    '/cadfuncionario',
    [CadastrarController::class, 'cadastrarFuncionario']
    )->name('cadfuncionario.post')->middleware('auth');



//Rota que exibe o formulário de cadastro de Setor
Route::get(
    '/cadfuncao',
    [CadastrarController::class, 'exibeCadFuncao']
    )->name('cadfuncao.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Setor
Route::post(
    '/cadfuncao',
    [CadastrarController::class, 'cadastrarFuncao']
    )->name('cadfuncao.post')->middleware('auth');


//Rota que exibe o formulário de cadastro de Fornecedor
Route::get(
    '/cadfornecedor',
    [CadastrarController::class, 'exibeCadFornecedor']
    )->name('cadfornecedor.get')->middleware('auth');

//Rota que processa o formulário de cadastro de Fornecedor
Route::post(
    '/cadfornecedor',
    [CadastrarController::class, 'cadastrarFornecedor']
    )->name('cadfornecedor.post')->middleware('auth');




//Rota que exibe os produtos já cadastrados
Route::get(
    '/exibeprodutos',
    [ExibirController::class, 'exibirProdutos']
    )->name('exibeprodutos.get')->middleware('auth');


//Rota que exibe os Fornecedores já cadastrados
Route::get(
    '/exibefornecedor',
    [ExibirController::class, 'exibeFornecedorCad']
    )->name('exibefornecedor.get')->middleware('auth');



//Rota que exibe os Cadastros Abrigados já cadastrados
Route::get(
    '/exibeabrigado',
    [ExibirController::class, 'exibeAbrigado']
    )->name('exibeabrigado.get')->middleware('auth');


//Rota que exibe os Cadastros Usuários já cadastrados
Route::get(
    '/exibeusuarios',
    [ExibirController::class, 'exibirUsuario']
    )->name('exibeusuarios.get')->middleware('auth');

//Rota que exibe os Cadastros de voluntários já cadastrados
Route::get(
    '/exibefuncionarios',
    [ExibirController::class, 'exibirFuncionarios']
    )->name('exibefuncionarios.get')->middleware('auth');

//Rota que VISUALIZA os Cadastro de voluntário
Route::get(
    '/visualfuncionario/{id}',
    [ExibirController::class, 'visualizarFuncionarios']
    )->name('visualfuncionario')->middleware('auth');

//Rota que VISUALIZA os Cadastro de Abrigado
Route::get(
    '/visualAbrigado/{id}',
    [ExibirController::class, 'visualizarAbrigado']
    )->name('visualAbrigado')->middleware('auth');

//Rota que exibe o ESTOQUE
Route::get(
    '/exibeestoque',
    [ExibirController::class, 'exibirEstoque']
    )->name('exibeestoque.get')->middleware('auth');

//Rota que exibe os NOTAS já cadastradas
Route::get(
    '/exibenotafiscal',
    [ExibirController::class, 'exibeNotaFiscal']
    )->name('exibenotafiscal.get')->middleware('auth');








//Rota que exclui as Categorias
Route::delete(
    '/excluircategoria/{id}',
    [ExcluirController::class, 'destroy']
    )->name('excluircategoria')->middleware('auth');

// Rota que exclui os produtos
Route::delete(
    '/excluirproduto/{id}',
    [ExcluirController::class, 'excluirProduto']
    )->name('excluirproduto')->middleware('auth');

// Rota que exclui os Fornecedores
Route::delete(
    '/excluirfornecedor/{id}',
    [ExcluirController::class, 'excluirFornecedor']
    )->name('excluirfornecedor')->middleware('auth');

// Rota que exclui as Apresentações
Route::delete(
    '/excluirapresentacao/{id}',
    [ExcluirController::class, 'excluiApresentacao']
    )->name('excluirapresentacao')->middleware('auth');

// Rota que exclui o Abrigado
Route::delete(
    '/excluirabrigado/{id}',
    [ExcluirController::class, 'excluirAbrigado']
    )->name('excluirabrigado')->middleware('auth');

// Rota que exclui o Usuário
Route::delete(
    '/excluirusuario/{id}',
    [ExcluirController::class, 'excluirUsuario']
    )->name('excluirusuario')->middleware('auth');

// Rota que exclui o Função
Route::delete(
    '/excluirfuncao/{id}',
    [ExcluirController::class, 'excluirFuncao']
    )->name('excluirfuncao')->middleware('auth');

// Rota que exclui o Setor
Route::delete(
    '/excluirsetor/{id}',
    [ExcluirController::class, 'excluirSetor']
    )->name('excluirsetor')->middleware('auth');

// Rota que exclui o Nível de Acesso
Route::delete(
    '/excluirnivelacesso/{id}',
    [ExcluirController::class, 'excluirNivelAcesso']
    )->name('excluirnivelacesso')->middleware('auth');


// Rota que exclui os produtos
Route::delete(
    '/excluirprodutoestoque/{id}',
    [ExcluirController::class, 'excluirProdutoEstoque']
    )->name('excluirprodutoestoque')->middleware('auth');

// Rota que exclui o LOCAL
Route::delete(
    '/excluirlocal/{id}',
    [ExcluirController::class, 'excluirlocal']
    )->name('excluirlocal')->middleware('auth');







// Rota que mostra o form para editar o SETOR
Route::get(
    '/editsetor/{id}',
    [EditController::class, 'editSetor']
    )->name('editsetor')->middleware('auth');

// ROTA QUE FAZ O UPDATE NO SETOR
Route::put(
    '/updatesetor/{id}',
    [EditController::class, 'updateSetor']
    )->name('updatesetor')->middleware('auth');


// Rota que mostra o form para editar o FORNECEDOR
Route::get(
    '/editfornecedor/{id}',
    [EditController::class, 'editFornecedor']
    )->name('editfornecedor')->middleware('auth');

// ROTA QUE FAZ O UPDATE NO FORNECEDOR
Route::put(
    '/updatefornecedor/{id}',
    [EditController::class, 'updateFornecedor']
    )->name('updatefornecedor')->middleware('auth');

// Rota que mostra o form para editar o PRODUTO
Route::get(
    '/editproduto/{id}',
    [EditController::class, 'editproduto']
    )->name('editproduto')->middleware('auth');

// ROTA QUE FAZ O UPDATE DO PRODUTO
Route::put(
    '/updateproduto/{id}',
    [EditController::class, 'updateProduto']
    )->name('updateproduto')->middleware('auth');

// Rota que mostra o form para editar a CATEGORIA
Route::get(
    '/editcategoria/{id}',
    [EditController::class, 'editcategoria']
    )->name('editcategoria')->middleware('auth');

// ROTA QUE FAZ O UPDATE DA CATEGORIA
Route::put(
    '/updatecategoria/{id}',
    [EditController::class, 'updateCategoria']
    )->name('updatecategoria')->middleware('auth');


// Rota que mostra o form para editar a UNIDADE de MEDIDA
Route::get(
    '/editapresentacao/{id}',
    [EditController::class, 'editApresentacao']
    )->name('editapresentacao')->middleware('auth');

// ROTA QUE FAZ O UPDATE DA UNIDADE de MEDIDA
Route::put(
    '/updateapresentacao/{id}',
    [EditController::class, 'updateApresentacao']
    )->name('updateapresentacao')->middleware('auth');


// Rota que mostra o form para editar os ABRIGADOS
Route::get(
    '/editabrigado/{id}',
    [EditController::class, 'editAbrigado']
    )->name('editabrigado')->middleware('auth');

// ROTA QUE FAZ O UPDATE DOS ABRIGADOS
Route::put(
    '/updateabrigado/{id}',
    [EditController::class, 'updateAbrigado']
    )->name('updateabrigado')->middleware('auth');


// Rota que mostra o form para editar os ABRIGADOS
Route::get(
    '/editusuario/{id}',
    [EditController::class, 'editUsuario']
    )->name('editusuario')->middleware('auth');

// ROTA QUE FAZ O UPDATE DOS ABRIGADOS
Route::put(
    '/updateusuario/{id}',
    [EditController::class, 'updateUsuario']
    )->name('updateusuario')->middleware('auth');

// Rota que mostra o form para editar as Funções
Route::get(
    '/editfuncao/{id}',
    [EditController::class, 'editFuncao']
    )->name('editfuncao')->middleware('auth');

// ROTA QUE FAZ O UPDATE das Funções
Route::put(
    '/updatefuncao/{id}',
    [EditController::class, 'updateFuncao']
    )->name('updatefuncao')->middleware('auth');

// Rota que mostra o form para editar Nivel de Acesso
Route::get(
    '/editnivelacesso/{id}',
    [EditController::class, 'editNivelAcesso']
    )->name('editnivelacesso')->middleware('auth');

// ROTA QUE FAZ O UPDATE do Nivel de Acesso
Route::put(
    '/updatenivelacesso/{id}',
    [EditController::class, 'updateNivelAcesso']
    )->name('updatenivelacesso')->middleware('auth');



Route::get('/login', [LoginController::class, 'exibeFormulario'])->name('login');

Route::post('/login', [LoginController::class, 'autenticaUsuario'])->name('login.post');

//Rota que exibe o formulário de login
Route::get('/logout', [LogoutController::class, 'realizaLogout'])->name('logout');

/*Route::get('/teste', function () {
    return view('cadAbrigado');
}); //ROTA PARA TESTES DE VIEWS*/

?>
