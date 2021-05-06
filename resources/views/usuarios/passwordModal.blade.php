<!-- Modal -->
<div class="modal fade " id="UsuarioModalEditPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cambiar contraseña para el usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('usuario.updatePassword')}}" autocomplete="of" method="POST">
                {{-- {{route('mestroCliente.delete')}} --}}
                @csrf
                @method('PUT')

                <div class="container-fluid">
                    <input type="hidden" name="idP" id="idP">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Cambiar la contraseña</label>
                            <input type="password" class="txt-form" name="passwordP" id="passwordP">
                        </div>
                        <div class="col-12">
                            <label for="">Repite la contraseña</label>
                            <input type="password" class="txt-form" name="passwordP2" id="passwordP2">
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