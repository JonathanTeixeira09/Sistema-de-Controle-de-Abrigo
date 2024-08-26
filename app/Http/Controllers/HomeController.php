<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{
    
    public function exibirPaginaInicial(){
        
        $user = auth()->user();
        
        return view('inicio', ['users' => $user]);
    }

}
?>