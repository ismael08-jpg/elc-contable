<!-- Modal IVA -->
<div class="modal fade " id="cobrarComision" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle"> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('compra.cobrar.comision')}}" method="POST">
                
                @csrf
                @method('put')
                <input type="hidden" name="cId_compra" id="cId_compra">
               

                
                <div class="row justify-content-center mt-5 mb-5">
                    
                    <div style="margin-right: 50px; margin-left: 50px">
                        <h3>¿De verdad desea marcar como cobrada la comisión?</h3> <br>
                        <br>
                        <label for=""> Fecha de cobro de la comisión</label>
                        <input type="date" class="txt-form" name="cFecha_pago_comision" id="cFecha_pago_comision" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Cobrar</button>
                </div>
            </form>

        </div>
    </div>

</div>