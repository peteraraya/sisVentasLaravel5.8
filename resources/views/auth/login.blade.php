@extends('auth.contenido')

@section('login')
<div class="row justify-content-center">

    <div class="card-group mb-0">
        <div id="loginBoxed" class="card p-3 bg-navy-zipek ">
            <form class="form-horizontal was-validated" method="POST" action="{{route('login')}}">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="card-title">

                        <img id="imagenLogin" class="img-responsive " src="{{ asset('img/login/carro_compras.png') }}" alt="Compras y Ventas">

                    </div>

                    <div class="input-group mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                        {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
                    </div>
                    <div class="input-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-lock" aria-hidden="true"></i>
                        </span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-danger bg-gradient-danger px-4">
                                <i class="fas fa-sign-in-alt"></i>
                                Iniciar sesión
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <span class="mb-0 pb-0 small text-center mt-3">
                <i class="fas fa-code   "></i>
                </i> Desarrollado por <a href="http://peteraraya.tk/#/home" class="text-success direction-right" target="_blank">Pedro Araya Gálvez</a>
            </span>
        </div>

    </div>

</div>
@endsection