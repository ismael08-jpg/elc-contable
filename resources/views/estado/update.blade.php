<!-- Modal -->
<div class="modal fade " id="estadoUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos del país</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('estado.update')}}" autocomplete="of" method="POST">
                @csrf
                @method('PUT')

                <div class="container">
                    <!--Hidden inputs-->
                    <input type="hidden" name="id" id="id" value="{{old('id')}}">
                    <div class="row">
                       
                
                        <div class="col-md-6">
                            <label>País</label>
                            <input type="text" maxlength="50" value="{{old('nombre_estado')}}" name="nombre_estado" readonly class="txt-form"  id="nombre_estado" >
                        </div>
                        
                        
                        <div class="col-md-6">
                            <label>¿Es paraiso fiscal?</label>
                            <select name="paraiso_fiscal" id="paraiso_fiscal" class="select-css">
                                <option value="Si" {{ old('paraiso_fiscal') == 'Si' ? 'selected' : '' }}>Si</option>
                                <option value="No" {{ old('paraiso_fiscal') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('paraiso_fical')
                                        <small>*{{$message}}</small>
                                    <br>
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