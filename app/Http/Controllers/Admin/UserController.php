<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:edit-users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $loggedId = intval(Auth::id());

        return view('admin.users.index',[
            'users' => $users,
            'loggedId' => $loggedId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:4|confirmed'
        ]);

        if($validator->fails()) {
            return redirect()->route('users.create')
            ->withErrors($validator)
            ->withInput();
        }

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user) {
            return view('admin.users.edit', [
                'user' => $user
            ]);
        } 

        return redirect()->route('users.index');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

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
                return redirect()->route('users.edit', [
                    'user' => $id
                ])->withErrors($validator);
            }

            $user->save();
        } 

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loggedId = intval(Auth::id());

        if($loggedId !== intval($id)) {
            $user = User::find($id);
            $user->delete();
        }

        return redirect()->route('users.index');
    }
}
