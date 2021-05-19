<!-- Modal -->
<div class="modal fade " id="detalleDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle"> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('detalleVenta.delete')}}" method="POST">
                
                @csrf
                @method('delete')
                <input type="hidden" name="did_detalle_venta" id="did_detalle_venta">
         

                
                <div class="row justify-content-center mt-5 mb-5">
                    <h3>¿De verdad desea eliminar esta compra?</h3> <br>
                    <h4>El registro no se podrá recuperar una vez eliminado</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>

        </div>
    </div>

</div>