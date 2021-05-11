<!-- Modal -->
<div class="modal fade " id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Maestro Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('maestroCliente.update')}}" method="POST">
                {{-- {{route('mestroCliente.delete')}} --}}
                @csrf
                @method('PUT')

                <input type="hidden" name="fid_maestro_cliente" id="fid_maestro_cliente">
                <input type="hidden" name="fid_cliente" id="fid_cliente">
                <div class="container m-auto">
                  <div class="row">

                      <div class="col-md-12">
                        <center>
                          <h5>Datos generales del cliente</h5>
                        </center>
                      </div>
                      
                          <div class="col-md-6">
                              <label>Nombre del Cliente<b>*</b></label>
                              <input type="text" class="txt-form" id="fnombre_cliente" name="fnombre_cliente" required>
                          </div>
                          <div class="col-md-6">
                              <label>N° Cliente ICG<b>*</b></label>
                              <input type="text" class="txt-form" name="fnumero_cliente_icg" id="fnumero_cliente_icg" required>
                          </div>
                          <div class="col-md-6">
                              <label>Otro número de cliente</label>
                              <input type="text" class="txt-form" name="fnumero_cliente" id="fnumero_cliente">
                          </div>
                          <div class="col-md-6">
                              <label>Nombre Comercial <b>*</b></label>
                              <input type="text" class="txt-form" name="fnombre_comercial" id="fnombre_comercial">
                          </div>
                          
                          <div class="col-md-6">

                              <label>Nombre del Sujeto<b>*</b></label><br>
                              <div id="fnombre_del_sujeto">
                                  <input type="radio" id="fnombre_del_sujeto_natural" required name="fnombre_del_sujeto" required
                                      value="Natural">
                                  <label for="male">Natural</label><br>
                                  <input type="radio" id="fnombre_del_sujeto_juridico" name="fnombre_del_sujeto" value="Juridico">
                                  <label for="female">Juridico</label><br>
                              </div>
                          </div>

                          <div class="col-md-6">
                              <label>¿Es paraiso fiscal?</label><br>
                              <div id="fparaiso_fiscal">
                                  <input type="radio" id="natural" name="fparaiso_fiscal" required value="Si">
                                  <label for="male">Si</label><br>
                                  <input type="radio" id="juridico" name="fparaiso_fiscal" value="No">
                                  <label for="female">No</label><br>
                              </div>
                          </div>

                          <div class="col-md-12">
                              <hr>
                              <center>
                                  <h5 class="mt-6">Persona de Contacto</h5>
                              </center>
                          </div>
                          <hr>
                          <div class="col-md-6">
                              <label>Nombre<b>*</b></label>
                              <input type="text" class="txt-form" required name="fnombre_contacto" id="fnombre_contacto">
                          </div>
                          <div class="col-md-6">
                              <label>Cargo<b>*</b></label>
                              <input type="text" class="txt-form" required name="fcargo_contacto" id="fcargo_contacto">
                          </div>
                          <div class="col-md-6">
                              <label>Página web</label>
                              <input type="text" class="txt-form" name="fpagina_web_contacto" id="fpagina_web_contacto">
                          </div>
                          <div class="col-md-6">
                              <label>Correo <b>*</b></label>
                              <input type="email" placeholder="someone@example.com"  class="txt-form" required name="fcorreo_contacto" id="fcorreo_contacto">
                          </div>
                          <div class="col-md-6">
                              <label>Teléfono Móvil Contacto</label>
                              <input type="text" class="txt-form" name="ftelefono_contacto" id="ftelefono_contacto">
                          </div>


                      



                      

                      <div class="col-md-12">
                        <hr>
                        <center>
                          <h5> Dirección</h5>
                        </center>
                      </div>
                      

                          <div class="col-md-12">
                              <label>Dirección<b>*</b></label>
                              <textarea class="txt-form" name="fdireccion" id="fdireccion" required id="" cols="20" rows="2">

                          </textarea>
                          </div>
                          <div class="col-md-6">
                              <label>País<b>*</b></label>
                              <select required name="fpais" id="fpais" class="select-css">
                                  @foreach ($pais as $pais)
                                      <option value="{{$pais->nombre_pais}}">{{$pais->nombre_pais}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-md-6">
                              <label>Código país (según mh)<b>*</b></label>
                              <input type="text" class="txt-form" required name="fcodigo_pais" id="fcodigo_pais">
                          </div>
                          <div class="col-md-6">
                              <label>Ciudad<b>*</b></label>
                              <input type="text" class="txt-form" required id="fciudad" name="fciudad">
                          </div>
                          <div class="col-md-6">
                              <label>Departamento/estado<b>*</b></label>
                              <select name="fdepartamento" id="fdepartamento" required class="select-css">
                                  @foreach ($estado as $estado)
                                    <option value="{{$estado->nombre_estado}}">{{$estado->nombre_estado}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-md-6">
                              <label>Municipio</label>
                              <input type="text" class="txt-form" name="fmunicipio" id="fmunicipio">
                          </div>


                          <div class="col-md-12">
                              <hr>
                              <center>
                                  <h5 class="mt-6"> Contacto</h5>
                              </center>
                          </div>
                          <hr>
                          <div class="col-md-6">
                              <label>Teléfono fijo<b>*</b></label>
                              <input type="text" class="txt-form" required name="ftelefono_fijo" id="ftelefono_fijo">
                          </div>
                          <div class="col-md-6">
                              <label>Página web</label>
                              <input type="text" class="txt-form" id="fpagina_web" name="fpagina_web">
                          </div>
                          <div class="col-md-6">
                              <label>Correo<b>*</b></label>
                              <input type="email" placeholder="someone@example.com"  class="txt-form" id="fcorreo" required name="fcorreo" >
                          </div>
                          <div class="col-md-6">
                              <label>Teléfono Móvil</label>
                              <input type="text" class="txt-form" name="ftelefono_celular" id="ftelefono_celular">
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
                          <label>Moneda principal<b>*</b></label>
                          
                            <select name="fmoneda_principal" id="fmoneda_principal" class="select-css" required >
                                @foreach ($moneda as $m)
                                    <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})">{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                                @endforeach
                            </select>
                      </div>
                      <div class="col-md-6">
                          <label>Tipo de cambio</label>
                          <select name="ftipo_cambio" id="ftipo_cambio" class="select-css" required >
                            @foreach ($moneda as $m)
                                <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})">{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                          <label>Giro Fiscal del negocio<b>*</b></label>
                          <input type="text" class="txt-form" required name="fgiro_fical_negocio" id="fgiro_fical_negocio">
                      </div>
                      <div class="col-md-6">
                          <label>Tipo contribuyente<b>*</b></label><br>
                          <div id="ftipo_contribuyente">
                              <input type="radio"  name="ftipo_contribuyente" required value="Grande">
                              <label for="grande">Grande</label><br>
                              <input type="radio"  name="ftipo_contribuyente" value="Mediano">
                              <label for="mediano">Mediano</label><br>
                              <input type="radio" name="ftipo_contribuyente" value="Pequeño">
                              <label for="pequeño">Pequeño</label><br>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label>NIT/NIFF<b>*</b></label>
                          <input type="text" class="txt-form" required name="fnit_niff" id="fnit_niff">
                      </div>
                      <div class="col-md-6">
                          <label>N° Registro fiscal<b>*</b></label>
                          <input type="text" class="txt-form" required name="fn_registro_fiscal" id="fn_registro_fiscal">
                      </div>

                      <div class="col-md-6">
                          <label>¿Se cobra IVA?<b>*</b></label><br>
                          <div id="fcobra_iva">
                              <input type="radio" id="cobraIva" name="fcobra_iva" required value="Si">
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio" id="cobra_iva2" name="fcobra_iva" value="No">
                              <label for="no">No</label><br>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label>¿Se entera IVA?<b>*</b></label><br>
                          <div id="fentera_iva">
                              <input type="radio" id="enteraIva" name="fentera_iva" required value="Si">
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio" id="entera_iva2" name="fentera_iva" value="No">
                              <label for="no">No</label><br>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label>Emitirá N/C<b>*</b></label><br>
                          <div id="femitira_nc">
                              <input type="radio" id="emitiraNc" name="femitira_nc" required value="Si">
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio" id="emitiraNc2" name="femitira_nc" value="No">
                              <label for="no">No</label><br>
                          </div>
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Retención (%)<b>*</b></label>
                          <input type="number" required class="txt-form" min="0" name="fporc_retencion" id="fporc_retencion">
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Percepció<b>*</b></label>

                          <div id="fpercepcion">
                              <input type="radio" id="percepcion1" name="fpercepcion" required value="Si">
                              <label for="si">Si</label>
                              <input class="ml-4" type="radio" id="percepcion2" name="fpercepcion" value="No">
                              <label for="no">No</label><br>
                          </div>
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Pasivo #1<b>*</b></label>
                          <input type="text" class="txt-form" required name="fcta_pasivo_uno" id="fcta_pasivo_uno">
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Pasivo #2</label>
                          <input type="text" class="txt-form" name="fcta_pasivo_dos" id="fcta_pasivo_dos">
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Activo #1<b>*</b></label>
                          <input type="text" class="txt-form" required name="fcta_activo_uno" id="fcta_activo_uno">
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>Cuenta Activo #2</label>
                          <input type="text" class="txt-form" name="fcta_activo_dos" id="fcta_activo_dos">
                      </div>
                      <div class="mt-2 col-md-6">
                          <label>% Comisión<b>*</b></label>
                          <input type="number" required class="txt-form" min="0" id="fcomision" name="fcomision">
                      </div>

                      <div class="mt-2 col-md-6">
                          <label>Condiciones de la Operación</label>
                          <textarea name="fcondiciones_operacion" id="fcondiciones_operacion" class="txt-form" cols="60" rows="6"></textarea>
                      </div>

                      <div class="mt-2 col-md-6">
                        <label>Condiciones del crédito </label>
                        <textarea name="fcondiciones_credito" id="fcondiciones_credito"  maxlength="50"  class="txt-form" cols="30" rows="3"></textarea>
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