@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')
    <h1>Meu Perfil</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i>Ocorreu um erro.</h5>
                    @foreach($errors->all() as $error)
                        {{$error}}<br/>
                    @endforeach
                    
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-success alert-dismissible p-auto">
                        
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i>{{session('warning')}}</h5>
                
                </div>
            @endif

            <form action={{route('profile.save')}} method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{$user->name}}" 
                        class="form-control @error('name') is-invalid @enderror" />
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$user->email}}" 
                        class="form-control @error('email') is-invalid @enderror" />
                    </div>   
                </div> 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nova Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" 
                        class="form-control @error('password') is-invalid @enderror" />
                    </div>  
                </div>   
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Senha Novamente</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" 
                        class="form-control @error('password') is-invalid @enderror" />
                    </div>   
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success" />
                    </div>   
                </div>  

            </form>
        </div>
    </div>
@endsection