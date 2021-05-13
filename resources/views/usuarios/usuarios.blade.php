@extends('layouts.main', ['activePage' => 'usuarios', 'titlePage' => __('Usuarios')])
@section('title', 'Gestión de usuarios')
@section('content')
<style>
    b{
        color: red;
    }

    

    
</style>


{{-- @include('usuarios.UsuariosModalDelete') --}}
@include('usuarios.usuariosModalUpdate')
@include('usuarios.passwordModal')


<div>
    <x-table>
        <div class="row justify-content-center pt-5">
            <h3>Gestión de usuarios</h3>
        </div>
        <div class="m-5 my-2">
            
            @error('nombre')
                <br>
                    <small>*{{$message}}</small>
                <br>
            @enderror
            @error('usuario')
                <br>
                    <small>*{{$message}}</small>
                <br>
            @enderror
            @error('email')
                <br>
                    <small>*{{$message}}</small>
                <br>
            @enderror
            @error('id')
                <br>
                    <small>*{{$message}}</small>
                <br>
            @enderror
            
            @include('usuarios.usuariosTable')   
        </div>
    </x-table>
</div>

@endsection

@push('js')

    @if ($alerta == "create"){
        <script>
            toastr["success"]("Maestro Agregado Correctamente", "Operación correcta");
        </script>
    }
    @endif
    @if ($alerta == "update")
        <script>
            toastr["success"]("Usuario Actualizado Correctamente", "Operación correcta");
            // toastr["warning"]("Datos. Estos cambios no afectaran a las ventas registradas anteriormente a este cambio", "Operación correcta");
        </script>
    @endif
    @if ($alerta == "deleteError")
        <script>
            toastr["error"]("El maestro no se puede eliminar. Tiene ventas ligadas", "Error");
        </script>
    @endif
    @if ($alerta == "delete")
        <script>
            toastr["info"]("Maestro Eliminado Correctamente", "Operación correcta");
        </script>
    @endif

   <script>
        function editarU(id,nombre,usuario, tipo_usuario, email ){


            

            $('#id').val(id);
            $('#nombre').val(nombre); 
            $('#usuario').val(usuario); 
            $('#tipo_usuario').val(tipo_usuario); 
            $('#email').val(email); 

           


            $('#UsuarioModalEdit').modal();
        }

        function changePassword(idp){
            //
            $('#idp').val(idp);
    
            $('#UsuarioModalEditPassword').modal();
        }


       $('#usuarioTable').DataTable({
             
             responsive: true,
             autowidth: false,
     
             "language": {
                 "lengthMenu": "Mostrar _MENU_ registros por página",
                 "zeroRecords": "Nada encontrado - disculpa :(",
                 "info": "Mostrando la página _PAGE_ de _PAGES_",
                 "infoEmpty": "No hay registros disponibles",
                 "infoFiltered": "(filtrado de _MAX_ registros totales)",
                 "search": "Buscar:",
                 "paginate": {
                     "next": "Siguiente",
                     "previous": "Anterior",
                 }
             }
                   
         });

         

    
   </script>


@endpush