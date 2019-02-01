@extends('layouts.index')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('changePassword')}}">
            <div class="row">
            @if(session('message'))
                        <div class="alert  alert-danger col-md-5" role="alert">
                                {{session('message')}}
                        </div>
            @else
                         <div class="alert  alert-success col-md-5" role="alert">
                                {{session('messageAcept')}}
                        </div>
            @endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-8">
                            <label>Nuevo Password</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="password" name="newPassword" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-8">
                            <label>Confirmar Password</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="password" name="confirmPassword" />
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                        <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <input type="submit" name="changePassword" value="Actualizar"/>
                                </div>
                        </div>
                        </div> 
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection