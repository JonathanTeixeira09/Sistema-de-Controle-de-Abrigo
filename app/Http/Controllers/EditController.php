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
use App\Models\Telefone;
use App\Models\Funcao;
use App\Models\Local;
use Carbon\Carbon;
use Laracasts\flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function editSetor($id){
        
        $setor = Setor::findOrFail($id);

        return view('editSetor', ['setors' => $setor]);
    }

    public function updateSetor(Request $request) {

        Setor::findOrFail($request->id)->update($request->all());

        flash('Setor editado com sucesso!')->success();
        return redirect()->route('cadsetor.get');
    }


    public function editFornecedor($id){

        $fornecedor = DB::table('fornecedors')
                        ->join('telefones','fornecedors.id_tel','=','telefones.id')
                        ->select('fornecedors.id as id','fornecedors.razaoSocial as nome','fornecedors.cnpj as cnpj','telefones.codArea as cod','telefones.numero as telefone', 'telefones.tipo as tipo', 'telefones.id as idtel')
                        ->where('fornecedors.id',$id)
                        ->first();
        
        return view('editFornecedor', ['fornecedors' => $fornecedor]);
    }

    public function updateFornecedor(Request $request) {
        
        $telefone = new Telefone();
        $telefone->id = $request->input('id_tel');
        $telefone = Telefone::findOrFail($telefone->id)->update($request->all());
        $fornecedor = Fornecedor::findOrFail($request->id)->update($request->all());

        flash('Fornecedor editado com sucesso!')->success();
        return redirect()->route('exibefornecedor.get');
    }

    public function editProduto($id){

        $uniMed = UniMed::orderBy('nome')->get();
        $categoria = Categoria::orderBy('nome')->get();

        $produto = Produto::findOrFail($id);
     
        return view('editProduto', ['uni_meds' => $uniMed, 'categorias' => $categoria , 'produtos' => $produto]);
    }

    public function updateProduto(Request $request) {

        Produto::findOrFail($request->id)->update($request->all());

        flash('Produto editado com sucesso!')->success();
        return redirect()->route('exibeprodutos.get');
    }



    public function editCategoria($id){
        
        $categoria = Categoria::findOrFail($id);

        return view('editCategoria', ['categorias' => $categoria]);
    }

    public function updateCategoria(Request $request) {

        Categoria::findOrFail($request->id)->update($request->all());

        flash('Categoria editada com sucesso!')->success();
        return redirect()->route('cadastrarcat.get');
    }



    public function editApresentacao($id){
        
        $uniMed = UniMed::findOrFail($id);

        return view('editApresentacao', ['uni_meds' => $uniMed]);
    }

    public function updateApresentacao(Request $request) {

        UniMed::findOrFail($request->id)->update($request->all());

        flash('Apresentação do produto editada com sucesso!')->success();
        return redirect()->route('cadunidade.get');
    }



    public function editAbrigado($id){

        $local = Local::where('nome','like', '%'.'Quarto'. '%')
        ->orderBy('nome')
        ->get();
        
        $abrigado = Abrigado::findOrFail($id);

        return view('editAbrigado', ['abrigados' => $abrigado, 'locals' => $local]);
    }

    public function updateAbrigado(Request $request) {

        Abrigado::findOrFail($request->id)->update($request->all());

        flash('Abrigado editado com sucesso!')->success();
        return redirect()->route('exibeabrigado.get');
    }



    public function editUsuario($id){

        $setor = Setor::orderBy('nome')->get();
        $nivelAcesso = NivelAcesso::orderBy('nome')->get();
        $pessoa = Pessoa::orderBy('nome')->get();

        $user = User::findOrFail($id);

        return view('editUsuario', ['users' => $user, 'setors' => $setor, 'nivel_acessos' => $nivelAcesso, 'pessoas' => $pessoa]);
    }

    public function updateUsuario(Request $request) {

        $validated = $request->validate([
            'password' => 'required|confirmed',
        ]);
        

        User::findOrFail($request->id)->update($request->all());

        flash('Usuário editado com sucesso!')->success();
        return redirect()->route('exibeusuarios.get');
    }



    public function editFuncao($id){
        
        $funcao = Funcao::findOrFail($id);

        return view('editFuncao', ['funcaos' => $funcao]);
    }

    public function updateFuncao(Request $request) {

        Funcao::findOrFail($request->id)->update($request->all());

        flash('Função editada com sucesso!')->success();
        return redirect()->route('cadfuncao.get');
    }



    public function editNivelAcesso($id){
        
        $nivelAcesso = NivelAcesso::findOrFail($id);

        return view('editNivel', ['nivel_acessos' => $nivelAcesso]);
    }

    public function updateNivelAcesso(Request $request) {

        NivelAcesso::findOrFail($request->id)->update($request->all());

        flash('Função editada com sucesso!')->success();
        return redirect()->route('cadnivel.get');
    }


}
