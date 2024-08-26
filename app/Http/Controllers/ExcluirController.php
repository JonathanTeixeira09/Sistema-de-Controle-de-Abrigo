<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Abrigado;
use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Funcao;
use App\Models\NivelAcesso;
use App\Models\Produto;
use App\Models\Setor;
use App\Models\Telefone;
use App\Models\UniMed;
use App\Models\User;
use App\Models\Local;
use Illuminate\Database\QueryException;
use Laracasts\flash;

class ExcluirController extends Controller
{

    public function destroy($id)
    {

        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            flash('Categoria excluída com sucesso!')->success();
            return redirect()->route('cadastrarcat.get');
        } catch (QueryException $e) {
            flash()->error('Categoria de produtos não pode ser apagada, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluirProduto($id)
    {

        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            flash('Produto excluído com sucesso!')->success();
            return redirect()->route('exibeprodutos.get');
        } catch (QueryException $e) {
            flash()->error('O produto não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }
        
    }

    public function excluirFornecedor($id)
    {

        $telFornecedor = Fornecedor::where('id', $id)->first();
        try {
            $fornecedor = Fornecedor::findOrFail($id);
            $fornecedor->delete();
            $telefone = Telefone::findOrFail($telFornecedor->id_tel);
            $telefone->delete();
            flash('Fornecedor foi excluído com sucesso!')->success();
            return redirect()->route('exibefornecedor.get');
        } catch (QueryException $e) {
            flash()->error('O Fornecedor não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluiApresentacao($id)
    {

        try {
            $uniMed = UniMed::findOrFail($id);
            $uniMed->delete();
            flash('Unidade de Medida excluída com sucesso!')->success();
            return redirect()->route('cadunidade.get');
        } catch (QueryException $e) {
            flash()->error('A Unidade de medida não pode ser apagada, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluirAbrigado($id)
    {
        $telAbrigado = Abrigado::where('id', $id)->first();
        try {
            $abrigado = Abrigado::findOrFail($id);
            $abrigado->delete();
            $telefone = Telefone::findOrFail($telAbrigado->id_tel);
            $telefone->delete();
            flash('Abrigado excluído com sucesso!')->success();
            return redirect()->route('exibeabrigado.get');
        } catch (QueryException $e) {
            flash()->error('O Abrigado não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluirUsuario($id)
    {

        try {
            $user = User::findOrFail($id);
            $user->delete();
            flash('Usuário excluído com sucesso!')->success();
            return redirect()->route('exibeusuarios.get');
        } catch (QueryException $e) {
            flash()->error('O abrigado não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluirFuncao($id)
    {

        try {
            $funcao = Funcao::findOrFail($id);
            $funcao->delete();
            flash('Função excluída com sucesso!')->success();
            return redirect()->route('cadfuncao.get');
        } catch (QueryException $e) {
            flash()->error('Função não pode ser apagada, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluirLocal($id)
    {

        try {
            $local = Local::findOrFail($id);
            $local->delete();
            flash('Local excluído com sucesso!')->success();
            return redirect()->route('cadlocal.get');
        } catch (QueryException $e) {
            flash()->error('Local não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }

    }



    public function excluirSetor($id)
    {
        try {
            $setor = Setor::FindOrFail($id);
            $setor->delete();
            flash('Setor excluído com sucesso!')->success();
            return redirect()->route('cadsetor.get');
        } catch (QueryException $e) {
            flash()->error('O setor não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluirNivelAcesso($id)
    {

        try {
            $NivelAcesso = NivelAcesso::findOrFail($id);
            $NivelAcesso->delete();
            flash('Nível de Acesso excluído com sucesso!')->success();
            return redirect()->route('cadnivel.get');
        } catch (QueryException $e) {
            flash()->error('Nível de Acesso não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }

    }

    public function excluirProdutoEstoque($id)
    {

        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            flash('Produto excluído com sucesso!')->success();
            return redirect()->route('exibeestoque.get');
        } catch (QueryException $e) {
            flash()->error('O produto não pode ser apagado, pois seu registro está em uso.');
            return redirect()->back();
        }
        
    }

}
