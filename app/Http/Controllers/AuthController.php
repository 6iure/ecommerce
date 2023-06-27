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

    public function login(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' => ['required, string'],
            'password' => ['required', 'string', 'min:6']
        ]);

        if ($validator->fails()) {

            return back()
                ->withInput()
                ->withErrors($validator->errors());

        } else {

            $user = New User();
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            Auth::login($user);

            return redirect()->route('dashboard');


            }

        }

    public function showRegisterForm(): View {

        /* TODO
            1. criar seeder de grupos -> OK
            2. enviar grupos para a tela do register -> OK
            3. criar select de grupos no form de register -> ok
            4. testar inserção usuário -> Ok ? Pergunta: Estou com duvidas para deslogar o usuario, pois quando consigo dar login uma vez, não é possivel voltar a pagina de se registrar.
            5. quando voltar pro form por conta de erros, tem que preencher os inputs -> OK
        */

        $groups = Group::all();

        $data = [
            'groups' => $groups,
        ];

        return view('pages.auth.register', $data);
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'group_id' => ['required', 'string'],
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
            $user->group_id = $request->group_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->password = $request->password;
            $user->save();

            Auth::login($user);

            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request) {

        Auth::logout();
        return redirect('/register');

    }
}

