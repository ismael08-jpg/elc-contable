<!-- Modal -->
<div class="modal fade " id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Maestro Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="maestroCliente.delete" method="POST">
                {{-- {{route('mestroCliente.delete')}} --}}
                @csrf
                @method('delete')
                <input type="hidden" name="did_maestro_cliente" id="did_maestro_cliente">
                <input type="hidden" name="did_cliente" id="did_cliente">

                
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
