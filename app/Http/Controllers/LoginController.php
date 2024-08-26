<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function exibeFormulario(){
        return view('login');
    }

    public function autenticaUsuario(Request $request){

        if(!filter_var($request->email, filter: FILTER_VALIDATE_EMAIL)){

            $login['success'] = false;
            $login['message'] = 'O e-mail informado não é valido!';
            echo json_encode($login);
            return;
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        /*$credentials = $request->validate([ 	// Validação dos dados do usuário
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);*/

        if (Auth::attempt($credentials)) {	// Tentativa de autenticação

            $login['success'] = true;
            //$login['message'] = 'O e-mail informado não é valido!';
            echo json_encode($login);
            return;

            //$request->session()->regenerate();


            //return redirect()->intended('/');	// Se autenticar com sucesso, redireciona o usuário para ‘home’
        }

            $login['success'] = false;
            $login['message'] = 'Os dados não conferem!';
            echo json_encode($login);
            return;


    }

}

?>
