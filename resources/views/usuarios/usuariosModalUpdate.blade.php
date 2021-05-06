<!-- Modal -->
<div class="modal fade " id="UsuarioModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('usuario.update')}}" autocomplete="of" method="POST">
                {{-- {{route('mestroCliente.delete')}} --}}
                @csrf
                @method('PUT')

                <div class="container-fluid">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="txt-form" name="nombre" id="nombre">
                        </div>
                        <div class="col-6">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="txt-form" name="usuario" id="usuario">
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="email" class="txt-form" name="email" id="email">
                        </div>
                        <div class="col-6">
                            <label for="">Tipo Usuario</label>
                            <select class="select-css" name="tipo_usuario" id="tipo_usuario">
                                @foreach ($tipos as $t)
                                    <option value="{{$t->id_tipo_usuario}}">{{$t->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Actualizar</button>
                </div>
            </form>

        </div>
    </div>

</div>