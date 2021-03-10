<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loggedId = intval( Auth::id() );

        $user = User::find($loggedId);

        if($user) {
            return view('admin.profile.index', [
                'user' => $user
            ]);
        }

        return redirect()->route('admin');
    }

    public function save(Request $request)
    {
        $loggedId = intval( Auth::id() );
        $user = User::find($loggedId);

        if($user) {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);
            $validator = Validator::make([
                'name' => $data['name'],
                'email' => $data['email']
            ], [
                'name' => 'required|string|max:100',
                'email' => 'required|string|email|max:100'
            ]);

            // Etapa 1. Alteração do nome
            $user->name = $data['name'];

            // Etapa 2. Alteração do email
            // Etapa 2.1 = Verificar se email novo é diferente antigo
            // Etapa 2.2 = Verificar se email novo se já existe no banco de dados
            // Etapa 2.3 = Salvar o E-mail novo

            // 2.1            
            if($user->email != $data['email']) {
                $hasEmail = User::where('email', $data['email'])->get();
                // 2.2
                if(count($hasEmail) > 0) {
                    $validator->errors()->add('email', __('validation.confirmed', [
                        'attribute' => 'email'
                    ]));
                }
                // 2.3
                $user->email = $data['email'];
            }

            // Etapa 3 Alteração da senha
            // Etapa 3.1 = Verificar se a senha maior/igual a 4 digitos
            // Etapa 3.2 = Verificar se a duas senhas são iguais
            // Etapa 3.3 = Salvar a senha nova

            if(!empty($data['password'])) {
                // 3.1
                if(strlen($data['password']) >= 4) {
                    // 3.2
                    if($data['password'] !== $data['password_confirmation']) {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => 'password'
                        ]));
                    } 
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min'       => 4
                    ]));
                }
                // 3.3
                $user->password = Hash::make($data['password']);
            }

            if(count($validator->errors()) > 0) {
                return redirect()->route('profile', [
                    'user' => $loggedId
                ])->withErrors($validator);
            }

            $user->save();
            return redirect()->route('profile')
                ->with('warning', 'Informações alterados com sucesso!');
        } 

        return redirect()->route('profile');
    }
}
