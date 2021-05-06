<table style="border-radius: 10px; width:" id="usuarioTable"  class="align-items-center table table-responsive table-sm table-hover">
    <thead class="thead-dark">
        <tr>
             <th>#</th>
             <th style="width: 100%">Nombre</th>
             <th>Usuario</th>
             <th>Tipo de usuario</th>
             <th>Email</th>
             <th>-</th>
             <th>-</th>
             
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $us)
         <tr>
             <td>{{$us->id}}</td>
             <td>{{$us->nombre}}</td>
             <td>{{$us->usuario}}</td>
             @if ($us->tipo_usuario==1)
                <td>Administrador</td>
            @else
                <td>Contador</td>
             @endif
             <td>{{$us->email}}</td>
             <td>
                <button class="btn" onclick="changePassword({{$us->id}})">Cambiar contraseña</button>
             </td>
             <td>
                <input type="image" onclick="eliminarU({{$us->id}});" form="formulario1" class="btn-calc math sombra" height="40px" width="40px" 
                src="{{asset('assets/img/del.png')}}"/>
             </td>
             <td>
                 <input type="image" onclick="editarU({{$us->id}}, '{{$us->nombre}}', '{{$us->usuario}}', {{$us->tipo_usuario}},'{{$us->email}}' )" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>
             
             
         </tr>    
         @endforeach
    </tbody>
</table>