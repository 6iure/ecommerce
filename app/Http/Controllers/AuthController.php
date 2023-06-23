<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class AuthController extends Controller
{
    //
    public function showLoginForm(): View {

        return view('pages.auth.login');
    }

    public function login() {
    }

    public function showRegisterForm(): View {

        /* TODO
            1. criar seeder de grupos
            2. enviar grupos para a tela do register
            3. criar select de grupos no form de register
            4. testar inserção usuário
            5. quando voltar pro form por conta de erros, tem que preencher os inputs
        */

        return view('pages.auth.register');
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', new Unique(User::class, 'email')],
            'cpf' => ['required', 'string', new Unique(User::class, 'cpf')],
            'password' => ['required', 'string', 'min:6']
        ]);

        if ($validator->fails()) {

            return back()
                ->withInput()
                ->withErrors($validator->errors());
        
        } else {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->password = $request->password;
            $user->save();

            Auth::login($user);

            return redirect()->route('dashboard');
        }
    }

    public function logout() {

    }
}

