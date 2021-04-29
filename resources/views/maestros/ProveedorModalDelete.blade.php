<!-- Modal -->
<div class="modal fade " id="ProveedorModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Maestro Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('maestroProveedor.delete')}}" method="POST">
                {{-- {{route('maestroProveedor.delete')}} --}}
                @csrf
                @method('delete')
                <input type="hidden" name="did_maestro_proveedor" id="did_maestro_proveedor">
                <input type="hidden" name="did_proveedor" id="did_proveedor">

                
                <div class="row justify-content-center mt-5 mb-5">
                    <h5>¿De verdad desea eliminar este maestro?</h5> <br>
                    <h6>El registro no se podrá recuperar una vez eliminado</h6>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>

        </div>
    </div>

</div>
