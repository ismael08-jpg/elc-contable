


<!-- Modal -->
<div class="modal fade " id="ProveedorModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Maestro Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('maestroProveedor.update')}}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" required name="fid_maestro_proveedor" value="{{old('fid_maestro_proveedor')}}" id="fid_maestro_proveedor">
                <input type="hidden" required name="fid_proveedor" value="{{old('fid_proveedor')}}" id="fid_proveedor">
                <div class="container m-auto">
                  <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                      <div class="col-md-12">
                        <center>
                          <h5>Datos generales del proveedor</h5>
                        </center>
                      </div>
                      
                          <div class="col-md-6">
                              <label>Nombre del Proveedor</label>
                              <input type="text" class="txt-form" required value="{{old('fnombre_proveedor')}}"  id="fnombre_proveedor" name="fnombre_proveedor" >
                              @error('fnombre_proveedor')
                                <small>*{{$message}}</small>
                              @enderror
                            </div>
                          <div class="col-md-6">
                              <label>N° Proveedor ICG</label>
                              <input type="text" class="txt-form" value="{{old('fnumero_proveedor_icg')}}"  name="fnumero_proveedor_icg" id="fnumero_proveedor_icg" >
                                @error('fnumero_proveedor_icg')
                                    <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Otro número de proveedor</label>
                              <input type="text" class="txt-form" value="{{old('fnumero_proveedor')}}"  name="fnumero_proveedor" id="fnumero_proveedor">
                              @error('fnumero_proveedor')
                              <small>*{{$message}}</small>
                          @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Nombre Comercial </label>
                              <input type="text" class="txt-form" required value="{{old('fnombre_comercial')}}"  name="fnombre_comercial" id="fnombre_comercial">
                              @error('fnombre_comercial')
                              <small>*{{$message}}</small>
                             @enderror
                            </div>
                          
                          <div class="col-md-6">

                              <label>Nombre del Sujeto</label><br>
                              <div id="fnombre_del_sujeto">
                                  <input type="radio" id="fnombre_del_sujeto_natural"  name="fnombre_del_sujeto" 
                                      value="Natural" {{ old('fnombre_del_sujeto')=="Natural" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                  <label for="male">Natural</label><br>
                                  <input type="radio" id="fnombre_del_sujeto_juridico"  {{ old('fnombre_del_sujeto')=="Juridico" ? 'checked='.'"'.'checked'.'"' : '' }} name="fnombre_del_sujeto" value="Juridico">
                                  <label for="female">Juridico</label><br>
                                  
                                </div>
                                @error('fnombre_del_sujeto')
                                  <small>*{{$message}}</small>
                                    @enderror
                          </div>

                          <div class="col-md-6">
                              <label>¿Es paraiso fiscal?</label><br>
                              <div id="fparaiso_fiscal">
                                  <input type="radio" id="natural" name="fparaiso_fiscal"  value="Si" {{ old('fparaiso_fiscal')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                  <label for="male">Si</label><br>
                                  <input type="radio" id="juridico" name="fparaiso_fiscal" value="No" {{ old('fparaiso_fiscal')=="No" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                  <label for="female">No</label><br>
                              </div>
                              @error('fparaiso_fiscal')
                                  <small>*{{$message}}</small>
                                    @enderror
                          </div>

                          <div class="col-md-12">
                              <hr>
                              <center>
                                  <h5 class="mt-6">Persona de Contacto</h5>
                              </center>
                          </div>
                          <hr>
                          <div class="col-md-6">
                              <label>Nombre</label>
                              <input type="text" class="txt-form" value="{{old('fnombre_contacto')}}"  name="fnombre_contacto" id="fnombre_contacto">
                              @error('fnombre_contacto')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Cargo</label>
                              <input type="text" class="txt-form" value="{{old('fcargo_contacto')}}"  name="fcargo_contacto" id="fcargo_contacto">
                              @error('fcargo_contacto')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Página web</label>
                              <input type="text" class="txt-form" value="{{old('fpagina_web_contacto')}}" name="fpagina_web_contacto" id="fpagina_web_contacto">
                              @error('fpagina_web_contacto')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Correo </label>
                              <input type="email" placeholder="someone@example.com" value="{{old('fcorreo_contacto')}}"  class="txt-form"  name="fcorreo_contacto" id="fcorreo_contacto">
                              @error('fcorreo_contacto')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Teléfono Móvil Contacto </label>
                              <input type="text" class="txt-form" name="ftelefono_contacto" value="{{old('ftelefono_contacto')}}" id="ftelefono_contacto">
                              @error('ftelefono_contacto')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>


                      



                      

                      <div class="col-md-12">
                        <hr>
                        <center>
                          <h5> Dirección</h5>
                        </center>
                      </div>
                      

                          <div class="col-md-12">
                              <label>Dirección<b></b></label>
                              <textarea class="txt-form" name="fdireccion" id="fdireccion"  cols="20" rows="2">
                                {{old('fdireccion')}}
                            </textarea>
                          @error('fdireccion')
                                  <small>*{{$message}}</small>
                                    @enderror
                          </div>
                          <div class="col-md-6">
                              <label>País</label> 
                              <select  name="fpais" id="fpais" class="select-css">
                                  @foreach ($pais as $pais)
                                      <option  {{ old('fpais') == $pais->nombre_pais ? 'selected' : '' }} value="{{$pais->nombre_pais}}">{{$pais->nombre_pais}}</option>
                                  @endforeach
                              </select>
                                    @error('fpais')
                                        <small>*{{$message}}</small>
                                    @enderror
                          </div>
                          <div class="col-md-6">
                              <label>Código país (según mh)</label>
                              <input type="text" class="txt-form"  value="{{old('fcodigo_pais')}}" name="fcodigo_pais" id="fcodigo_pais">
                              @error('fcodigo_pais')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Ciudad</label>
                              <input type="text" class="txt-form" value="{{old('fciudad')}}"  id="fciudad" name="fciudad">
                              @error('fciudad')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Departamento/estado</label>
                              <select name="fdepartamento" id="fdepartamento"  class="select-css">
                                  @foreach ($estado as $estado)
                                    <option value="{{$estado->nombre_estado}}"  {{ old('fdepartamento') == $estado->nombre_estado? 'selected' : '' }}>{{$estado->nombre_estado}}</option>
                                  @endforeach
                              </select>
                              @error('fdepartamento')
                                  <small>*{{$message}}</small>
                                    @enderror
                          </div>
                          <div class="col-md-6">
                              <label>Municipio</label>
                              <input type="text" class="txt-form" name="fmunicipio" value="{{old('fmunicipio')}}" id="fmunicipio">
                              @error('fmunicipio')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>


                          <div class="col-md-12">
                              <hr>
                              <center>
                                  <h5 class="mt-6"> Contacto</h5>
                              </center>
                          </div>
                          <hr>
                          <div class="col-md-6">
                              <label>Teléfono fijo</label>
                              <input type="text" class="txt-form"  name="ftelefono_fijo" value="{{old('ftelefono_fijo')}}" id="ftelefono_fijo">
                              @error('ftelefono_fijo')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Página web</label>
                              <input type="text" class="txt-form" id="fpagina_web" value="{{old('fpagina_web')}}" name="fpagina_web">
                              @error('fpagina_web')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Correo</label>
                              <input type="email" placeholder="someone@example.com"  value="{{old('fcorreo')}}" class="txt-form" id="fcorreo"  name="fcorreo" >
                              @error('fcorreo')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                          <div class="col-md-6">
                              <label>Teléfono Móvil</label>
                              <input type="text" class="txt-form" name="ftelefono_celular" value="{{old('ftelefono_celular')}}" id="ftelefono_celular">
                              @error('ftelefono_celular')
                              <small>*{{$message}}</small>
                                @enderror
                            </div>
                      



                  </div>  {{-- row --}}
                  
                  <br>
                  <hr>
                  <div class="row">

                      <div class="mt-8 col-12">
                          <center>
                              <h5 class="mt-10">Informción general</h5>
                          </center>
                      </div>

                      <div class="col-md-6">
                          <label>Moneda principal</label>
                          
                            <select name="fmoneda_principal" id="fmoneda_principal" class="select-css"  >
                                @foreach ($moneda as $m)
                                    <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})" {{ old('fmoneda_principal') == $m->nombre_moneda." (".$m->simbolo.")" ? 'selected' : '' }}>{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                                @endforeach
                            </select>
                            @error('fmoneda_principal')
                                  <small>*{{$message}}</small>
                                    @enderror
                      </div>
                      <div class="col-md-6">
                          <label>Tipo de cambio</label>
                          <select name="ftipo_cambio" id="ftipo_cambio" class="select-css"  >
                            @foreach ($moneda as $m)
                                <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})" {{ old('ftipo_cambio') == $m->nombre_moneda." (".$m->simbolo.")" ? 'selected' : '' }}>{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                            @endforeach
                        </select>
                        @error('ftipo_cambio')
                                  <small>*{{$message}}</small>
                                    @enderror
                      </div>
                      <div class="col-md-6">
                          <label>Giro Fiscal del negocio</label>
                          <input type="text" class="txt-form"  name="fgiro_fical_negocio" value="{{old('fgiro_fical_negocio')}}" id="fgiro_fical_negocio">
                          @error('fgiro_fical_negocio')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>
                      <div class="col-md-6">
                          <label>Tipo contribuyente</label><br>
                          <div id="ftipo_contribuyente">
                              <input type="radio"  name="ftipo_contribuyente"  value="Grande"  {{ old('ftipo_contribuyente')=="Grande" ? 'checked='.'"'.'checked'.'"' : '' }}  >
                              <label for="grande">Grande</label><br>
                              <input type="radio"  name="ftipo_contribuyente" value="Mediano"  {{ old('ftipo_contribuyente')=="Mediano" ? 'checked='.'"'.'checked'.'"' : '' }}  >
                              <label for="mediano">Mediano</label><br>
                              <input type="radio" name="ftipo_contribuyente" value="Pequeño"  {{ old('ftipo_contribuyente')=="Pequeño" ? 'checked='.'"'.'checked'.'"' : '' }}  >
                              <label for="pequeño">Pequeño</label><br>
                          </div>
                          @error('ftipo_contribuyente')
                                  <small>*{{$message}}</small>
                                    @enderror
                      </div>
                      <div class="col-md-6">
                          <label>NIT/NIFF</label>
                          <input type="text" class="txt-form" value="{{old('fnit_niff')}}"   name="fnit_niff" id="fnit_niff">
                          @error('fnit_niff')
                          <small>*{{$message}}</small>
                            @enderror
                     </div>
                      <div class="col-md-6">
                          <label>N° Registro fiscal</label>
                          <input type="text" class="txt-form"  value="{{old('fn_registro_fiscal')}}"  name="fn_registro_fiscal" id="fn_registro_fiscal">
                          @error('fn_registro_fiscal')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>

                      <div class="col-md-6">
                          <label>¿Se cobra IVA?</label><br>
                          <div id="fcobra_iva">
                              <input type="radio" name="fcobra_iva" {{ old('fcobra_iva')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}  value="Si">
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio"{{ old('fcobra_iva')=="No" ? 'checked='.'"'.'checked'.'"' : '' }} name="fcobra_iva" value="No">
                              <label for="no">No</label><br>
                          </div>
                          @error('fcobra_iva')
                                  <small>*{{$message}}</small>
                                    @enderror
                      </div>
                      <div class="col-md-6">
                          <label>¿Se entera IVA?</label><br>
                          <div id="fentera_iva">
                              <input type="radio"  name="fentera_iva" {{ old('fentera_iva')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}  value="Si">
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio"  {{ old('fentera_iva')=="No" ? 'checked='.'"'.'checked'.'"' : '' }} name="fentera_iva" value="No">
                              <label for="no">No</label><br>
                          </div>
                          @error('fentera_iva')
                                  <small>*{{$message}}</small>
                                    @enderror
                      </div>
                      <div class="col-md-6">
                          <label>Emitirá N/C</label><br>
                          <div id="femitira_nc">
                              <input type="radio" id="emitiraNc" name="femitira_nc" {{ old('femitira_nc')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}  value="Si" >
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio" id="emitiraNc2" {{ old('femitira_nc')=="No" ? 'checked='.'"'.'checked'.'"' : '' }} name="femitira_nc" value="No">
                              <label for="no">No</label><br>
                          </div>
                          @error('femitira_nc')
                                  <small>*{{$message}}</small>
                                    @enderror
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Retención (%)</label>
                          <input type="number"  class="txt-form" required value="{{old('fporc_retencion')}}"   min="0" name="fporc_retencion" id="fporc_retencion">
                          @error('fporc_retencion')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>
                      <div class="mt-2 col-md-6">
                          <label>Percepció</label>

                          <div id="fpercepcion">
                              <input type="radio" id="percepcion1" name="fpercepcion" {{ old('fpercepcion')=="Si" ? 'checked='.'"'.'checked'.'"' : '' }}  value="Si">
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio" id="percepcion2" {{ old('fpercepcion')=="No" ? 'checked='.'"'.'checked'.'"' : '' }} name="fpercepcion" value="No">
                              <label for="no">No</label><br>
                          </div>
                          @error('fpercepcion')
                                  <small>*{{$message}}</small>
                                    @enderror
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Pasivo #1</label>
                          <input type="text" class="txt-form" value="{{old('fcta_pasivo_uno')}}"  name="fcta_pasivo_uno" id="fcta_pasivo_uno">
                          @error('fcta_pasivo_uno')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Pasivo #2</label>
                          <input type="text" class="txt-form" value="{{old('fcta_pasivo_dos')}}" name="fcta_pasivo_dos" id="fcta_pasivo_dos">
                          @error('fcta_pasivo_dos')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Activo #1</label>
                          <input type="text" class="txt-form"  value="{{old('fcta_activo_uno')}}"  name="fcta_activo_uno" id="fcta_activo_uno">
                          @error('fcta_activo_uno')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Activo #2</label>
                          <input type="text" class="txt-form" value="{{old('fcta_activo_dos')}}" name="fcta_activo_dos" id="fcta_activo_dos">
                          @error('fcta_activo_dos')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>
                      <div class="mt-2 col-md-6">
                          <label>% Comisión<b></b></label>
                          <input type="number"  class="txt-form" value="{{old('fcomision')}}" required min="0" id="fcomision" name="fcomision">
                          @error('fcomision')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>

                      <div class="mt-2 col-md-6">
                          <label>Condiciones de la Operación</label>
                          <textarea name="fcondiciones_operacion"  id="fcondiciones_operacion" class="txt-form" cols="60" rows="6">{{old('fcondiciones_operacion')}}</textarea>
                          @error('fcondiciones_operacion')
                          <small>*{{$message}}</small>
                            @enderror
                        </div>

                      <div class="mt-2 col-md-6">
                        <label>Condiciones del crédito </label>
                        <textarea name="fcondiciones_credito" value="{{old('fcondiciones_credito')}}" id="fcondiciones_credito"  maxlength="50"  class="txt-form" cols="30" rows="3"></textarea>
                        @error('fcondiciones_credito')
                        <small>*{{$message}}</small>
                          @enderror  
                    </div>

                  </div>
                </div>



                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>

        </div>
    </div>

</div>