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
use App\Models\Pessoa;
use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Compra;
use App\Models\Local;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExibirController extends Controller{

    public function exibirProdutos(){
        $produto = Produto::orderBy('nome')->get();
        
        return view('exibeProdutos', ['produtos' => $produto]);
        //$uniMed = UniMed::orderBy('nome')->get();
        //$categoria = Categoria::orderBy('nome')->get();
        //$todo = Produto::orderBy('nome')->get();

        //return view('exibeProdutos', ['uni_meds' => $uniMed, 'categorias' => $categoria, 'todo' => $todo]);
    }

    public function exibirFuncionarios(){

        $pessoa = DB::table('pessoas')
                ->join('telefones','pessoas.id_tel','=','telefones.id')
                ->select('pessoas.id as id','pessoas.nome as nome','pessoas.email as email', 'telefones.codArea as cod','telefones.numero as telefone', 'pessoas.dataNasc as dataNasc')
                ->orderBy('nome')
                ->get();


        return view('exibeFuncionario', ['pessoas' => $pessoa]);

    }

    public function visualizarAbrigado($id){

        $abrigado = DB::table('abrigados')
                ->join('locals','abrigados.idLoc','=','locals.id')
                ->join('telefones','abrigados.id_tel','=','telefones.id')
                ->select('abrigados.id as id','abrigados.nome as nome','abrigados.nome_mae as nome_mae','abrigados.nome_pai as nome_pai','abrigados.dataEnt as dataEnt','abrigados.dataSai as dataSai', 'abrigados.dataNasc as dataNasc','abrigados.nome_resp as nome_resp','abrigados.cpf as cpf','abrigados.genero as genero', 'abrigados.obs as obs','locals.nome as local','telefones.tipo as tipotel', 'telefones.codArea as cod','telefones.numero as telefone')
                ->where('abrigados.id',$id)
                ->first();

        return view('visualAbrigado', ['abrigados' => $abrigado]);
    }

    public function visualizarFuncionarios($id){

        $pessoa = DB::table('pessoas')
                ->join('telefones','pessoas.id_tel','=','telefones.id')
                ->join('funcaos','pessoas.id_func','=','funcaos.id')
                ->join('enderecos', 'pessoas.id_end', '=', 'enderecos.id')
                ->join('bairros', 'enderecos.id_bai', '=', 'bairros.id')
                ->join('cidades', 'bairros.id_cid','=','cidades.id')
                ->join('estados', 'cidades.id_est','=','estados.id')
                ->select('pessoas.id as id','pessoas.nome as nome','pessoas.email as email', 'pessoas.dataNasc as dataNasc', 'pessoas.cpf as cpf', 'pessoas.genero as genero','pessoas.formacao as forma', 'pessoas.statusform as status', 'pessoas.nomeform as nomeform', 'pessoas.dataEnt as dataEnt', 'pessoas.dataSai as dataSai', 'funcaos.nome as nomeFunc', 'telefones.tipo as tipotel', 'telefones.codArea as cod','telefones.numero as telefone',  'pessoas.id_end as idEnd', 'enderecos.nomeLog as log', 'enderecos.tipoLog as tipoLog', 'enderecos.nrEnd as nrEnd', 'enderecos.complEnd as compl', 'enderecos.cep as cep', 'bairros.nome as bairro', 'cidades.nome as cidade', 'estados.nome as estado')
                ->where('pessoas.id',$id)
                ->first();

        return view('visualFuncionario', ['pessoas' => $pessoa]);

    }

    public function exibirUsuario(){

        $user = DB::table('users')
                    ->join('pessoas','users.id_pes','=','pessoas.id')
                    ->join('setors','users.id_set','=','setors.id')
                    ->join('nivel_acessos','users.id_nivel','=','nivel_acessos.id')
                    ->select('users.id as id', 'users.email as email', 'pessoas.nome as nome', 'setors.nome as setnome', 'nivel_acessos.nome as nomeniv')
                    ->orderBy('nome')
                    ->get();

        return view('exibeUsuario', ['users' => $user]);
    }

    public function exibeFornecedorCad(){
        $fornecedor = DB::table('fornecedors')
                        ->join('telefones','fornecedors.id_tel','=','telefones.id')
                        ->select('fornecedors.id as id','fornecedors.razaoSocial as nome','fornecedors.cnpj as cnpj','telefones.codArea as cod','telefones.numero as telefone')
                        ->orderBy('nome')
                        ->get();
        
        return view('exibeFornecedor', ['fornecedors' =>$fornecedor]);
    }

    public function exibeAbrigado(){
       
        $abrigado = DB::table('abrigados')
                ->join('locals','abrigados.idLoc','=','locals.id')
                ->select('abrigados.id as id','abrigados.nome as nome','abrigados.dataEnt as dataEnt','abrigados.dataSai as dataSai', 'abrigados.dataNasc as dataNasc','abrigados.nome_resp as nome_resp','abrigados.cpf as cpf', 'locals.nome as local')
                ->orderBy('nome')
                ->get();

        return view('exibeAbrigado', ['abrigados' => $abrigado]);
    }


    public function exibirEstoque(){

        $produto = DB::table('produtos')
                    ->join('categorias','produtos.id_cat','=','categorias.id')
                    ->select('produtos.id as id', 'produtos.nome as nome', 'produtos.descricao as descricao', 'produtos.quantidade as quant', 'produtos.qtdMin as qtdMin', 'categorias.nome as nomecat', 'produtos.lote as lote', 'produtos.vencimento as val')
                    ->orderBy('nome')
                    ->get();
        
        return view('exibeEstoque', ['produtos' => $produto]);
    }
   

    public function exibeNotaFiscal(){

        $compra = DB::table('compras')
                ->join('fornecedors', 'compras.id_forn','=','fornecedors.id')
                ->select('compras.id as id', 'compras.nrNotaFiscal as nrNota','compras.dataCompra as dataCompra', 'fornecedors.razaoSocial as nomeFon')
                ->orderBy('nrNota')
                ->get();

        return view('exibeNotaFiscal', ['compras' => $compra]);
    }

}
?>