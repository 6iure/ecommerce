<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\Rules\Unique;

class AuthController extends Controller
{

    public function showLoginForm(): View
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6']
        ]);

        if ($validator->fails()) {

            return back()
                ->withInput()
                ->withErrors($validator->errors());
        } else {

            $user = User::where('email', $request->email)->first();

            Auth::login($user);
            return redirect('/categories');
        }
    }

    public function showRegisterForm(): View
    {

        $groups = Group::all();

        $data = [
            'groups' => $groups,
        ];

        return view('pages.auth.register', $data);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'group_id' => ['required', 'integer', new Exists(Group::class, 'id')],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', new Unique(User::class, 'email')],
            'cpf' => ['required', 'string', 'min:11', 'max:11', new Unique(User::class, 'cpf')],
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
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::login($user);

            return redirect()->route('categories.index');
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();

        return redirect('/logout');
    }
}
