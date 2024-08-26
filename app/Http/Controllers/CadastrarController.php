<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categoria;
use App\Models\UniMed;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\NivelAcesso;
use App\Models\Setor;
use App\Models\Abrigado;
use App\Models\Telefone;
use App\Models\Funcao;
use App\Models\Pessoa;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Bairro;
use App\Models\Endereco;
use App\Models\Compra;
use App\Models\Local;
use Carbon\Carbon;
use Laracasts\flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Response;



class CadastrarController extends Controller{

    //INICIO CADASTRO DE USUÁRIOS
    public function exibeCadastroUsuario(){
        $setor = Setor::orderBy('nome')->get();
        $nivelAcesso = NivelAcesso::orderBy('nome')->get();
        $pessoa = Pessoa::orderBy('nome')->get();
        
        return view('cadUsuario', ['setors' => $setor, 'nivel_acessos' => $nivelAcesso, 'pessoas' => $pessoa]);
    }

    public function cadastraUsuario(Request $request){

        $validated = $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            'id_pes' => 'unique:users|id_pes',
        ]);



        $usuario = new User();
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->id_pes = $request->input('nome');
        $usuario->id_set = $request->input('setor');
        $usuario->id_nivel = $request->input('nivelAcesso');

        $usuario->save();

        flash('Usuário cadastrado com sucesso!')->success();
        return redirect()->route('cadastrar.get');
    }//FIM CADASTRO DE USUÁRIOS

    //INICIO CADASTRO DE CATEGORIA
    public function exibeCadastroCategoria(){
        $categoria = Categoria::orderBy('nome')->get();

        return view('cadCategoria', ['categorias' => $categoria]);
    }

    public function cadastrarCategoria(Request $request){

        $validated = $request->validate([
            'nome' => 'required|unique:categorias|max:100',
        ]);
        
        $categoria = new Categoria(); 
        $categoria->nome = $request->input('nome');

        $categoria->save();
        
        flash('Categoria cadastrada com sucesso!')->success();
        return redirect()->route('cadastrarcat.get');

    }//FIM CADASTRO DE CATEGORIA

    //INICIO CADASTRO DE UNIDADE DE MEDIDA DOS PRODUTOS
    public function exibeCadastroUniMed(){
        $uniMed = UniMed::orderBy('nome')->get();

        return view('cadApresentacao', ['uni_meds' => $uniMed]);
    }

    public function cadastrarUniMed(Request $request){


        $validated = $request->validate([
            'nome' => 'required|unique:uni_meds|max:100',
        ]);        

        $uniMed = new UniMed(); 
        $uniMed->nome = $request->input('nome');

        $uniMed->save();

        flash('Unidade de medida cadastrada com sucesso!')->success();
        return redirect()->route('cadunidade.get');

    }//FIM CADASTRO DE UNIDADE DE MEDIDA DOS PRODUTOS

    //INICIO CADASTRO DE PRODUTOS
    public function exibeCadProduto() {
        $uniMed = UniMed::orderBy('nome')->get();
        $categoria = Categoria::orderBy('nome')->get();

        return view('cadProdutos', ['uni_meds' => $uniMed, 'categorias' => $categoria]);
    }

    public function cadastrarProduto(Request $request){


        $validated = $request->validate([
            'nome' => 'required|max:250',
            'qtdMin' => 'required',
        ]);        

        $produto = new Produto(); 
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->id_cat = $request->input('categoria');
        $produto->id_uni = $request->input('apresentacao');
        $produto->qtdMin = $request->input('qtdMin');
        $produto->vencimento = Carbon::createFromFormat('d/m/Y', $request->input('dataVal'))->format('Y/m/d');
        $produto->lote = $request->input('lote');

        $produto->save();

        flash('Produto cadastrado com sucesso!')->success();
        return redirect()->route('cadproduto.get');

    }//FIM //INICIO CADASTRO DE PRODUTOS

    //INICIO CADASTRO DE FORNECEDORES
    public function exibeCadFornecedor(){
        return view('cadFornecedor');
    }

    public function cadastrarFornecedor(Request $request){

        $validated = $request->validate([
            'razaoSocial' => 'required|max:250',
            'cnpj' => 'required|unique:fornecedors',
            'tipo' => 'required',
            'numero' => 'required|unique:telefones',
            
            
        ]); 
        
        $telefone = Telefone::create($request->all());

        $fornecedor = new Fornecedor($request->all());
        $fornecedor->id_tel = $telefone->id;

        $fornecedor->save();

        flash('Fornecedor cadastrado com sucesso!')->success();
        return redirect()->route('cadfornecedor.get');

    }//FIM CADASTRO DE FORNECEDORES

    //INICIO CADASTRO DE NIVEL DE ACESSO
    public function exibeCadNivelAcesso(){
        $nivelAcesso = NivelAcesso::orderBy('nome')->get();

        return view('cadNivel', ['nivel_acessos' => $nivelAcesso]);
    }

    public function cadastrarNivelAcesso(Request $request){


        $validated = $request->validate([
            'nome' => 'required|unique:nivel_acessos|max:100',
        ]);        

        $nivelAcesso = new NivelAcesso(); 
        $nivelAcesso->nome = $request->input('nome');

        $nivelAcesso->save();

        flash('Nível de acesso cadastrado com sucesso!')->success();
        return redirect()->route('cadnivel.get');

    }//FIM CADASTRO DE NIVEL DE ACESSO

    //INICIO CADASTRO DE SETOR
    public function exibeCadSetor(){
        $setor = Setor::orderBy('nome')->get();

        return view('cadSetor', ['setors' => $setor]);
    }

    public function cadastrarSetor(Request $request){


        $validated = $request->validate([
            'nome' => 'required|unique:setors|max:100',
        ]);        

        $setor = new Setor(); 
        $setor->nome = $request->input('nome');

        $setor->save();

        flash('Setor cadastrado com sucesso!')->success();
        return redirect()->route('cadsetor.get');

    }//FIM CADASTRO DE SETOR

    //INICIO CADASTRO DE ABRIGADOS
    public function exibeCadAbrigado(){
        
        $local = Local::where('nome','like', '%'.'Quarto'. '%')
                ->orderBy('nome')
                ->get();

        return view('cadAbrigado', ['locals' => $local]);
    }

    public function cadastrarAbrigado(Request $request){


        $validated = $request->validate([
            'nome' => 'required|unique:abrigados|max:250',
            'dataNasc' => 'required',
            'dataEnt' => 'required',
            'cpf' => 'unique:abrigados',
        ]);        

        $telefone = Telefone::create($request->all());
        $abrigado = Abrigado::create($request->all());
        $abrigado->id_tel = $telefone->id;
        $abrigado->save();


        flash('Abrigado cadastrado com sucesso!')->success();
        return redirect()->route('cadabrigado.get');

    }// FIM CADASTRO DE ABRIGADOS

    //INICIO CADASTRO DE FUNCIONÁRIOS
    public function exibeCadFuncionario(){
        $funcao = Funcao::orderBy('nome')->get();
        $estado = Estado::orderBy('nome')->get();
        $cidade = Cidade::orderBy('nome')->get();
        $bairro = Bairro::orderBy('nome')->get();

        return view('cadPessoa', ['funcaos' => $funcao, 'estados' => $estado, 'cidades' => $cidade, 'bairros' => $bairro]);
    }

    public function cadastrarFuncionario(Request $request){

        $validated = $request->validate([
            'nome' => 'required|max:250',
            'cpf' => 'required|unique:pessoas',
            'dataNasc' => 'required',
            'dataEnt' => 'required',
            'email' => 'required|unique:pessoas',
            'nomeform' => 'required',           
            
        ]); 

         
        $telefone = Telefone::create($request->all());
        $endereco = $request->all();

        if($endereco != null){
            $endereco = Endereco::create($request->all());

            $pessoa = new Pessoa($request->all());
            $pessoa->id_tel = $telefone->id;
            $pessoa->id_end = $endereco->id;
        }else{
            $pessoa = new Pessoa($request->all());
            $pessoa->id_tel = $telefone->id;
        }
                

        $pessoa->save();

        flash('Voluntário cadastrado com sucesso!')->success();
        return redirect()->route('cadfuncionario.get');

    }

    //INICIO CADASTRO DE FUNÇÃO
    public function exibeCadFuncao(){
        $funcao = Funcao::orderBy('nome')->get();

        return view('cadFuncao', ['funcaos' => $funcao]);
    }

    public function cadastrarFuncao(Request $request){


        $validated = $request->validate([
            'nome' => 'required|unique:funcaos|max:120',
        ]);        

        $funcao = new Funcao(); 
        $funcao->nome = $request->input('nome');

        $funcao->save();

        flash('Função cadastrada com sucesso!')->success();
        return redirect()->route('cadfuncao.get');

    }//FIM CADASTRO DE FUNÇÃO

    //INICIO CADASTRO DE NOTA FISCAL
    public function exibeCadNotaFiscal(){
        
        $fornecedor = Fornecedor::orderBy('razaoSocial')->get();

        return view('cadNotaFiscal' , ['fornecedors' => $fornecedor]);
    }

    public function cadastrarNotaFiscal(Request $request){

        $validated = $request->validate([
            'nrNotaFiscal' => 'required|unique:compras|max:100',
            'dataCompra' => 'required',
            'id_forn' => 'required',
        ]); 
        
        $compra = new Compra($request->all());

        $compra->save();

        flash('Nota Fiscal cadastrada com sucesso!')->success();
        return redirect()->route('cadnotafiscal.get');

    }//FIM CADASTRO DE NOTA FISCAL

    //INICIO CADASTRO DE LOCAL
    public function exibeCadLocal(){
        $local = Local::orderBy('nome')->get();

        return view('cadLocal', ['locals' => $local]);
    }

    public function cadastrarLocal(Request $request){


        $validated = $request->validate([
            'nome' => 'required|unique:locals|max:120',
        ]);        

        $local = Local::create($request->all());

        $local->save();

        flash('Local cadastrado com sucesso!')->success();
        return redirect()->route('cadlocal.get');

    }//FIM CADASTRO DE LOCAL

    
}

?>