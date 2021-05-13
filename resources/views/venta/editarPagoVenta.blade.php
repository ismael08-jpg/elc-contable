<!-- Modal -->
<div class="modal fade " id="editarPagarVentaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle"> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('venta.edit.pay')}}" method="POST">
                
                @csrf
                @method('PUT')
                <input type="hidden" name="epId_venta" id="epId_venta">
               
                <div class="col-md-12">
                    <label for="venta">Editar la fecha en que se cobró la venta</label>
                    <input type="date" name="epFecha_pago" id="epFecha_pago" class="txt-form">
                </div>
                <hr>
                <div class="">
                    <button type="button" class="ml-2 btn btn-danger" >Cancelar</button>
                    <button type="submit" class="btn btn-warning">Marcar como cobrado</button>
                </div>
            </form>

        </div>
    </div>

</div>