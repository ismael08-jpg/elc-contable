<form action="{{route('maestroCliente.store')}}" method="POST" id="frm">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <center><h3>Datos generales del cliente</h3></center>
        </div>
        <div class="col-md-6">
            <label>Nombre del Cliente<b>*</b></label>
            <input type="text" maxlength="50" value="{{old('nombre_cliente')}}"  class="txt-form" name="nombre_cliente" id="nombre_cliente" value="{{old('nombre_cliente')}}" >
            @error('nombre_cliente')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>N° Cliente ICG<b>*</b></label>
            <input type="text" maxlength="50"  class="txt-form" value="{{old('numero_cliente_icg')}}" name="numero_cliente_icg" id="numero_cliente_icg" required>
            @error('numero_cliente_icg')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Otro número de cliente</label>
            <input type="text" maxlength="50" value="{{old('numero_cliente')}}" class="txt-form" name="numero_cliente" id="numero_cliente" >
            @error('numero_cliente')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Nombre Comercial <b>*</b></label>
            <input type="text" maxlength="50"  value="{{old('nombre_comercial')}}" required  class="txt-form" name="nombre_comercial" id="nombre_comercial">
            @error('nombre_comercial')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Nombre del Sujeto<b>*</b></label><br>

            <div id="nombre_del_sujeto">
                <input type="radio"   required name="nombre_del_sujeto" value="Natural"  {{ old('nombre_del_sujeto')=="Natural" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="Natural">Natural</label><br>
                <input type="radio"  name="nombre_del_sujeto" value="Juridico" {{ old('nombre_del_sujeto')=="Juridico" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="Juridico">Juridico</label><br> 
            </div>
            @error('nombre_del_sujeto')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>¿Es paraiso fiscal?</label><br>           
            <div id="paraiso_fiscal">
                <input type="radio" name="paraiso_fiscal" required value="Si"  onclick="des(this.form,0)" {{ old('paraiso_fiscal')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="Si">Si</label><br>
                <input type="radio" name="paraiso_fiscal" value="No"  onclick="des(this.form,1)" {{ old('paraiso_fiscal')=="No" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="No">No</label><br> 
            </div>
            @error('paraiso_fiscal')
            <small>*{{$message}}</small>
            @enderror
        </div>

        <hr>
         
        <div class="col-md-12">
            <center><h3> Dirección</h3></center>
        </div>
            <div class="col-md-6">
                    <label>Dirección</label>
                    <textarea maxlength="200" class="txt-form" name="direccion" id="direccion" maxlength="200" >{{old('direccion')}}</textarea>
                    @error('direccion')
                    <small>*{{$message}}</small>
                    @enderror
            </div>
                
                <div class="col-md-6">
                    <label>País<b>*</b></label>
                    <select  class="select-css" required id="txtPais" name="pais">
                        <option value="">Seleccione un País</option>
                        @foreach ($pais as $pais)
                            <option value="{{$pais->id}}"  {{ old('pais') == $pais->id ? 'selected' : '' }}>
                                {{$pais->nombre_pais}}
                            </option>
                        @endforeach
                    </select>
                    @error('pais')
                        <small>*{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Código país (según mh)<b>*</b></label>
                    <input type="text" maxlength="50"  value="{{old('codigo_pais')}}" class="txt-form" required name="codigo_pais" id="codigoPais">
                    @error('codigo_pais')
                        <small>*{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Ciudad<b>*</b></label>
                    <input type="text" maxlength="50" value="{{old('ciudad')}}"  class="txt-form" required name="ciudad" id="ciudad">
                    @error('ciudad')
                        <small>*{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Departamento/Estado<b>*</b></label>
                    {{-- <input type="text" maxlength="50"  class="txt-form" required name="departamento"> --}}
                    <select name="departamento" data-old="{{ old('departamento') }}" id="txtEstado" required class="select-css"></select>
                    @error('departamento')
                        <small>*{{$message}}</small>
                    @enderror
                </div>

                
                
                <div class="col-md-6">
                    <label>Municipio<b>*</b></label>
                    <div id="hiddenMunicipio">
                        <input type="text" required maxlength="50" value="{{old('municipio')}}"  id="txtMunicipio" class="txt-form" name="municipio">
                    </div>
                    <div id="hiddenSelectMunicipio" >
                        <select name="municipio" disabled required id="selectMunicipio" data-old="{{old('municipio')}}"   class="select-css"></select>
                    </div>
                    @error('municipio')
                        <small>*{{$message}}</small>
                    @enderror
                </div>

        <div class="col-md-12">
            <hr>
            <center><h3 class="mt-3">Persona de Contacto</h3></center>
        </div>
        <hr>
        <div class="col-md-6">
            <label>Nombre<b>*</b></label>
            <input type="text" maxlength="50" value="{{old('nombre_contacto')}}"  class="txt-form" required name="nombre_contacto" id="nombre_contacto">
            @error('nombre_contacto')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Cargo<b>*</b></label>
            <input type="text" maxlength="50"  class="txt-form" value="{{old('cargo_contacto')}}" required name="cargo_contacto" id="cargo_contacto">
            @error('cargo_contacto')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Página web</label>
            <input type="text" maxlength="50"  class="txt-form" value="{{old('pagina_web_contacto')}}" name="pagina_web_contacto" id="pagina_web_contacto" >
            @error('pagina_web_contacto')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Correo <b>*</b></label>
            <input type="email" placeholder="someone@example.com" value="{{old('correo_contacto')}}" class="txt-form" required name="correo_contacto" id="correo_contacto">
            @error('correo_contacto')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Teléfono Móvil Contacto <b>*</b></label>
            <input type="text"  required value="{{old('telefono_contacto')}}"  class="txt-form" name="telefono_contacto" id="tContacto"  >
            @error('telefono_contacto')
            <small>*{{$message}}</small>
            @enderror
        </div> 
 
        <!-- que si -->
      
       

                
                <div class="col-md-12">
                    <hr>
                    <center><h3 class="mt-3"> Contacto</h3></center>
                </div>
                <hr>
                <div class="col-md-6">
                    <label>Teléfono fijo<b>*</b></label>
                    <input type="text" maxlength="50" value="{{old('telefono_fijo')}}"  class="txt-form" required name="telefono_fijo" id="tFijo" >
                    @error('telefono_fijo')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label>Página web</label>
                    <input type="text" maxlength="50" value="{{old('pagina_web')}}"  class="txt-form" name="pagina_web" id="pagina_web">
                    @error('pagina_web')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label>Correo<b>*</b></label>
                    <input type="email" value="{{old('correo')}}" maxlength="50"  placeholder="someone@example.com"  class="txt-form" required name="correo" id="correo" >
                    @error('correo')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label>Teléfono Móvil</label>
                    <input type="text" maxlength="50"  class="txt-form" name="telefono_celular" id="tMovil" value="{{old('telefono_celular')}}" >
                    @error('telefono_celular')
                        <small>*{{$message}}</small>
                    @enderror
                </div>

            
       
</div>
<br>
<hr>

<!---------------------- INFORMACIÓN GENERAL ------------------>

<div class="row">
    
    <div class="mt-8 col-12"><center><h3 class="mt-10">Información general</h3></center></div>
        
    <div class="col-6">
            <label>Moneda principal<b>*</b></label>
                
            <select name="moneda_principal" id="moneda_principal" class="select-css" required >
                <option value="">Seleccione una moneda</option>
                @foreach ($moneda as $m)
                    <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})" {{ old('moneda_principal') == $m->nombre_moneda." (".$m->simbolo.")" ? 'selected' : '' }}>{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                @endforeach
            </select>
            @error('moneda_principal')
                <small>*{{$message}}</small>
            @enderror
        </div>

        <div class="col-md-6">
            <label>Tipo de cambio</label>
            
            <select name="tipo_cambio" id="tipo_cambio" class="select-css" required >
                <option value="">Seleccione un tipo de cambio</option>
                @foreach ($moneda as $m)
                    <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})" {{ old('moneda_principal') == $m->nombre_moneda." (".$m->simbolo.")" ? 'selected' : '' }}>{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                @endforeach
            </select>
            @error('tipo_cambio')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Giro Fiscal del negocio<b>*</b></label>
            <input type="text" maxlength="50"  class="txt-form" value="{{old('giro_fical_negocio')}}" required name="giro_fical_negocio" id="giro_fical_negocio">
            @error('giro_fical_negocio')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <label>Tipo contribuyente<b>*</b></label><br>
            <div id="tipoContribuyente">
                <input type="radio"  name="tipo_contribuyente" required value="Grande" {{ old('tipo_contribuyente')=="Grande" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label>Grande</label><br>
                <input type="radio"  name="tipo_contribuyente" value="Mediano" {{ old('tipo_contribuyente')=="Mediano" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label>Mediano</label><br> 
                <input type="radio"  name="tipo_contribuyente" value="Pequeño" {{ old('tipo_contribuyente')=="Pequeño" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label>Pequeño</label><br> 
            </div>
            @error('tipo_contribuyente')
                <small>*{{$message}}</small>
            @enderror
        </div>

        <div class="col-md-3">
            <label>NIT/NIFF<b>*</b></label>
            <div id="hiddenNit_niff">
                <input type="text" maxlength="50" value="{{old('nit_niff')}}"  class="txt-form" required id="txtNit_niff" name="nit_niff">
            </div>
            <div id="hiddenNitValidado">
                <input type="text" maxlength="50" value="{{old('nit_niff')}}"  disabled placeholder="0000-000000-000-0" pattern="[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}" class="txt-form" required id="txtNitValidado" name="nit_niff">
            </div>

            @error('nit_niff')
                <small>*{{$message}}</small>
            @enderror
           
        </div>  

        

        <div class="col-md-3">
            <label>N° Registro fiscal<b>*</b></label>
            <div id="hiddenNRegistro">
                <input type="text" maxlength="50"  class="txt-form" value="{{old('n_registro_fiscal')}}" required  name="n_registro_fiscal" required id="txtNRegistro" >
            </div>
            <div id="hiddenNRegistroValidado">
                <input type="text"  name="n_registro_fiscal" value="{{old('n_registro_fiscal')}}" class="txt-form" disabled    required id="nRegistroValidado" >
            </div>
            @error('n_registro_fiscal')
                <small>*{{$message}}</small>
            @enderror
            
        </div>

        <div class="col-md-3">
            <label>¿Se cobra IVA?<b>*</b></label><br>
            <div id="cobraIva">
                <input type="radio"  name="cobra_iva" required  value="Si" {{ old('cobra_iva')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label  for="si">Si</label>
                <input class="ml-4"  type="radio"  name="cobra_iva" value="No" {{ old('cobra_iva')=="No" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="no">No</label><br> 
            </div>
            @error('cobra_iva')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <label>¿Se entera IVA?<b>*</b></label><br>
            <div id="enteraIva">
                <input type="radio"  name="entera_iva" required value="Si" {{ old('entera_iva')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="si">Si</label>
                <input class="ml-4" type="radio"  name="entera_iva" value="No" {{ old('entera_iva')=="No" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="no">No</label><br> 
            </div>
            @error('entera_iva')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <label>Emitirá N/C<b>*</b></label><br>
            <div id="emitiraNc">
                <input type="radio" name="emitira_nc" required value="Si" {{ old('emitira_nc')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="si">Si</label>
                <input class="ml-4"  type="radio"  name="emitira_nc" value="No" {{ old('emitira_nc')=="No" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="no">No</label><br> 
            </div>
            @error('emitira_nc')
                <small>*{{$message}}</small>
            @enderror
        </div>

        
        <div class="mt-2 col-md-3">
            <label>Retención Fiscal (%)<b>*</b></label>
            <input type="number" required class="txt-form" value="{{old('porc_retencion')}}" min="0" id="porc_retencion" name="porc_retencion">
            @error('porc_retencion')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-3">
            <label>Percepción<b>*</b></label>

            <div id="percepcion">
                <input type="radio"  name="percepcion" required value="Si" {{ old('percepcion')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="Si">Si</label>
                <input type="radio" class="ml-4"  name="percepcion" value="No" {{ old('percepcion')=="No" ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="No">No</label><br> 
            </div>
            @error('percepcion')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-3">
            <label>Cuenta Pasivo #1<b>*</b></label>
            <input type="text" maxlength="50" value="{{old('cta_pasivo_uno')}}"  class="txt-form" required name="cta_pasivo_uno" id="cta_pasivo_uno">
            @error('cta_pasivo_uno')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-3">
            <label>Cuenta Pasivo #2</label>
            <input type="text" maxlength="50"  class="txt-form" name="cta_pasivo_dos" value="{{old('cta_pasivo_dos')}}" id="cta_pasivo_dos">
            @error('cta_pasivo_dos')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-3">
            <label>Cuenta Activo #1<b>*</b></label>
            <input type="text" maxlength="50" value="{{old('cta_activo_uno')}}" class="txt-form" required name="cta_activo_uno" id="cta_activo_uno">
            @error('cta_activo_uno')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-3">
            <label>Cuenta Activo #2</label>
            <input type="text" maxlength="50" value="{{old('cta_activo_dos')}}"  class="txt-form" name="cta_activo_dos" id="cta_activo_dos">
            @error('cta_activo_dos')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-6">
            <label>% Comisión<b>*</b></label>
            <input type="number" value="{{old('comision')}}"  required class="txt-form" min="0" name="comision" id="comision">
            @error('comision')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-6">
            <label>Condiciones de la Operación</label>
            <textarea maxlength="50" name="condiciones_operacion" id="condiciones_operacion" class="txt-form" cols="30" rows="3">{{old('condiciones_operacion')}}</textarea>
            @error('condiciones_operacion')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="mt-2 col-md-6">
            <label>Condiciones del crédito </label>
            <textarea name="condiciones_credito" id="condiciones_credito" maxlength="50"  class="txt-form" cols="30" rows="3">{{old('condiciones_credito')}}</textarea>
            @error('condiciones_credito')
                <small>*{{$message}}</small>
            @enderror
        </div>
</div>
{{-- <div class="row justify-content-center">
    <input type="submit" value="Crear" class=" mt-5 btn btn-radius btn-azul">
</div> --}}


</form>   