<!-- Modal -->
<div class="modal fade " id="ventaModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('venta.update')}}" autocomplete="of" method="POST">
                
                @csrf
                @method('PUT')
                <!--Hidden inputs-->
                <input type="hidden" name="uId_venta" id="uId_venta">
                <div class="container">

                    <div class="row">
                        <div class="col-6">
                            <label>Cliente</label>
                            <select id="uId_cliente" class="select-css" name="uId_cliente" >
                                <option value="">Seleccione un cliente</option>
                                @foreach ($clientes as $c)
                                    <option value="{{$c->id_cliente}}" {{ old('uId_cliente') == $c->id_cliente ? 'selected' : '' }}>{{$c->nombre_cliente}}</option>
                                @endforeach
                            </select>
                            @error('uId_cliente')
                                    <small>*{{$message}}</small>
                                <br>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>Crédito Fiscal</label>
                            <input type="text" class="txt-form" name="uCredito_fiscal" id="uCredito_fiscal" value="{{old('uCredito_fiscal')}}">
                            @error('uCredito_fiscal')
                                    <small>*{{$message}}</small>
                                <br>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>Monto Venta</label>
                            <input type="number" class="txt-form" step="0.01" min="1" name="uMonto_ven" id="uMonto_ven" value="{{old('monto_ven')}}">
                            @error('uMonto_ven')
                                    <small>*{{$message}}</small>
                                <br>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>Concepto Venta</label>
                            <input type="text" class="txt-form" maxlength="50" name="uConcepto_ven" id="uConcepto_ven" value="{{old('uConcepto_ven')}}">
                            @error('uConcepto_ven')
                                    <small>*{{$message}}</small>
                                <br>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>Fecha Emisión</label>
                            <input type="date" class="txt-form" maxlength="50" name="uFecha_emision" id="uFecha_emision" value="{{old('uFecha_emision')}}">
                            @error('uFecha_emision')
                                    <small>*{{$message}}</small>
                                <br>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>Fecha Vencimiento</label>
                            <input type="date" class="txt-form" maxlength="50" name="uFecha_vencimiento" id="uFecha_vencimiento"  value="{{old('uFecha_vencimiento')}}">
                            @error('uFecha_vencimiento')
                                    <small>*{{$message}}</small>
                                <br>
                            @enderror
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