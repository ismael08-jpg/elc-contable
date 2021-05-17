<!-- Modal -->
<div class="modal fade " id="compraEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de la compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('compra.update')}}" autocomplete="of" method="POST">
                
                @csrf
                @method('PUT')
               
                <div class="container">

                    <div class="row">
                        <!--Hiden inputs-->
                        <input type="hidden" name="uid_venta" value="{{$venta->id_venta}}">
                        <input type="hidden" name="uid_compra" id="id_compra">
                        <div class="col-md-6">
                            <label>Proveedor</label>
                            <select class="select-css" name="uid_proveedor" id="id_proveedor">
                                <option value="">Seleccione un proveedor para la compra</option>
                                @foreach ($proveedor as $p)
                                    <option value="{{$p->id_proveedor}}" {{ old('uid_proveedor') == $p->id_proveedor ? 'selected' : '' }}>{{$p->nombre_proveedor}}</option>
                                @endforeach
                            </select>
                            @error('uid_proveedor')
                            <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Crédito Fiscal</label>
                            <input type="text" class="txt-form" name="ucredito_fiscal" id="credito_fiscal" value="{{old('ucredito_fiscal')}}">
                            @error('ucredito_fiscal')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Monto de la compra</label>
                            <input type="text" class="txt-form" name="umonto_com" id="monto_com"  value="{{old('umonto_com')}}">
                            @error('umonto_com')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Concepto</label>
                            <input type="text" class="txt-form" name="uconcepto_com" id="concepto_com" value="{{old('uconcepto_com')}}">
                            @error('uconcepto_com')
                            <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Fecha emisión</label>
                            <input type="date" class="txt-form" name="ufecha_emision" id="fecha_emision"  value="{{old('ufecha_emision')}}">
                            @error('ufecha_emision')
                            <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Fecha vencimiento</label>
                            <input type="date" class="txt-form" name="ufecha_vencimiento" id="fecha_vencimiento" value="{{old('ufecha_vencimiento')}}">
                            @error('ufecha_vencimiento')
                            <small>*{{$message}}</small>
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