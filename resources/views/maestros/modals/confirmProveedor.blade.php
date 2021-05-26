<!-- Modal -->
<div class="modal fade " id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirme que los datos para crear el cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('maestroProveedor.update')}}" method="POST">
               

                <div class="container">
                    
                    <div id="confirme">

                    </div>
                </div>






                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning" form="fm">Registrar Maestro</button>
                </div>
            </form>

        </div>
    </div>

</div>