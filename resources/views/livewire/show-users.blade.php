<div>
    <x-table>
        <div class="m-5 my-2">
            {{$message}}
            <div class="pb-2">
                <input type="text" wire:model="message">
            </div>
            <section style="margin: auto">
                <br>
                
                <table style="border-radius: 10px;" class=" align-items-center table table-sm table-hover">
                    <thead class="thead-dark">
                        <tr>
                             <th>#</th>
                             <th>Nombre</th>
                             <th>Usuario</th>
                             <th>Tipo</th>
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
                                 <td>{{$us->tipo_usuario}}</td>
                                 <td>{{$us->email}}</td>
                                 <td>
                                    <input type="image" form="formulario1" class="btn-calc math sombra" height="40px" width="40px" 
                                    src="{{asset('assets/img/del.png')}}"/>
                                 </td>
                                 <td>
                                     <input type="image" form="formulario1" class="btn-calc math sombra" height="40px" width="40px" 
                                    src="{{asset('assets/img/edi.png')}}"/>
                                </td>
                                 
                                 
                             </tr>    
                         @endforeach
                    </tbody>
                </table>
                <br>
            </section>
        </div>
    </x-table>
</div>
