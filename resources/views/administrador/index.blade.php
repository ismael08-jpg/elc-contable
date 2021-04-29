@extends('layouts.master')

@section('title', 'Administrador')


@section('content')
    <x-table>
        <div class="container">
            <div class="row">
                Bienvenido al área de Administrador
            </div>
    
            <div class="row">
                <div class="col-md">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-round btn-azul mb-2" value="Cerrar sesión">
                    </form>
                </div>
                
                <div class="col-12">
                    <a href="{{ route('maestroCliente.index') }}" class="btn btn-success mb-2">Maestros de Clientes</a>
                </div>
                <div class="col-12">
                    <a href="{{ route('maestroProveedor.index') }}" class="btn btn-info mb-2">Maestros de Proveedores</a>
                </div>
            </div>
        </div>
    </x-table>
  
@endsection
