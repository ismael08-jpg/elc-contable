<table style="border-radius: 10px; text-align: center"  id="ventaTable"  class="align-items-center table table-responsive table-sm table-warning">
    <thead class="thead-dark">
        <tr>
             <th>#</th>
             <th>Nombre del País</th>
             <th>Código del país</th>
             <th>¿Es paraiso?</th>
             <th>-</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($pais as $det)
         <tr>
             <td >{{$det->id}}</td>
             <td style="width: 60%">{{$det->nombre_pais}}</td>
             <td style="width: 15%">{{$det->codigo}}</td>
             <td style="width: 25%">{{$det->paraiso_fiscal}}</td>
            

             <td>
                 <input type="image" onclick="editar({{$det->id}}, '{{$det->nombre_pais}}', '{{$det->codigo}}', '{{$det->paraiso_fiscal}}')" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>
             
             
         </tr>    
         @endforeach
    </tbody>
</table>