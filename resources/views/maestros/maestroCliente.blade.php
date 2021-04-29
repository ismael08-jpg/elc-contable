@extends('layouts.master')

@section('title', 'Catalogo de Créditos')


@section('content')

    <style>
        b{
            color: red;
        }

        

        
    </style>


    @include('maestros.modalDelete')
    @include('maestros.modalUpdate')

    <div class="row">
        <div class="col-12">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" class="btn btn-round btn-azul" value="Cerrar sesión">
            </form>
        </div>
    </div>
    <div>
        <x-table>
            <div class="m-5 my-2">
                <div class="pb-2">
                </div>
                <section style="margin: auto">
                    <div class="container-fluid">
                        <form action="{{route('maestroCliente.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <center><h5>Datos generales del cliente</h5></center>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nombre del Cliente<b>*</b></label>
                                            <input type="text" class="form-control" name="nombre_cliente" value="{{old('nombre_cliente')}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>N° Cliente ICG<b>*</b></label>
                                            <input type="text" class="form-control" name="numero_cliente_icg" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Otro número de cliente</label>
                                            <input type="text" class="form-control" name="numero_cliente">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nombre Comercial <b>*</b></label>
                                            <input type="text" class="form-control" name="nombre_comercial">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nombre del Sujeto<b>*</b></label><br>
                                            <div id="nombre_sujeto" >
                                                <input type="radio" id="natural" required name="nombre_del_sujeto" value="Natural" >
                                                <label for="male">Natural</label><br>
                                                <input type="radio" id="juridico" name="nombre_del_sujeto" value="Juridico" >
                                                <label for="female">Juridico</label><br> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>¿Es paraiso fiscal?</label><br>
                                            <div id="paraiso_fiscal">
                                                <input type="radio" id="natural" name="paraiso_fiscal" required value="Si">
                                                <label for="male">Si</label><br>
                                                <input type="radio" id="juridico" name="paraiso_fiscal" value="No">
                                                <label for="female">No</label><br> 
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                            <center><h5 class="mt-3">Persona de Contacto</h5></center>
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <label>Nombre<b>*</b></label>
                                            <input type="text" class="form-control" required name="nombre_contacto">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cargo<b>*</b></label>
                                            <input type="text" class="form-control" required name="cargo_contacto">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Página web</label>
                                            <input type="text" class="form-control"  name="pagina_web_contacto">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Correo <b>*</b></label>
                                            <input type="email" class="form-control" required name="correo_contacto">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Teléfono Móvil Contacto</label>
                                            <input type="text" class="form-control" name="telefono_contacto">
                                        </div>
                                        
                                    </div>
                            </div>

                                
                                <div class="col-6">
                                    <center><h5> Dirección</h5></center>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <label>Dirección<b>*</b></label>
                                            <textarea class="form-control" name="direccion" required id="" cols="20" rows="2">

                                            </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>País<b>*</b></label>
                                            <input type="text" class="form-control" required name="pais">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Código país (según mh)<b>*</b></label>
                                            <input type="text" class="form-control" required name="codigo_pais">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Ciudad<b>*</b></label>
                                            <input type="text" class="form-control" required name="ciudad">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Departamento<b>*</b></label>
                                            <input type="text" class="form-control" required name="departamento">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Municipio</label>
                                            <input type="text" class="form-control" name="municipio">
                                        </div>

                                        
                                        <div class="col-md-12">
                                            <hr>
                                            <center><h5 class="mt-3"> Contacto</h5></center>
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <label>Teléfono fijo<b>*</b></label>
                                            <input type="text" class="form-control" required name="telefono_fijo">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Página web</label>
                                            <input type="text" class="form-control" name="pagina_web">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Correo<b>*</b></label>
                                            <input type="email" class="form-control" required name="correo">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Teléfono Móvil</label>
                                            <input type="text" class="form-control" name="telefono_celular">
                                        </div>
                                    </div>

                                    
                                </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            
                            <div class="mt-8 col-12"><center><h5 class="mt-10">Informción general</h5></center></div>
                                
                            <div class="col-3">
                                    <label>Moneda principal<b>*</b></label>
                                    <input type="text" class="form-control" required name="moneda_principal">
                                </div>
                                <div class="col-md-3">
                                    <label>Tipo de cambio</label>
                                    <input type="text" class="form-control" name="tipo_cambio">
                                </div>
                                <div class="col-md-3">
                                    <label>Giro Fiscal del negocio<b>*</b></label>
                                    <input type="text" class="form-control" required name="giro_fical_negocio">
                                </div>
                                <div class="col-md-3">
                                    <label>Tipo contribuyente<b>*</b></label><br>
                                    <div id="tipoContribuyente">
                                        <input type="radio" id="grande" name="tipo_contribuyente" required value="Grande">
                                        <label for="grande">Grande</label><br>
                                        <input type="radio" id="mediano" name="tipo_contribuyente" value="Mediano">
                                        <label for="mediano">Mediano</label><br> 
                                        <input type="radio" id="otro" name="tipo_contribuyente" value="Otro">
                                        <label for="otro">Otro</label><br> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>NIT/NIFF<b>*</b></label>
                                    <input type="text" class="form-control" required name="nit_niff">
                                </div>
                                <div class="col-md-3">
                                    <label>N° Registro fiscal<b>*</b></label>
                                    <input type="text" class="form-control" required name="n_registro_fiscal">
                                </div>
        
                                <div class="col-md-3">
                                    <label>¿Se cobra IVA?<b>*</b></label><br>
                                    <div id="cobraIva">
                                        <input type="radio" id="cobraIva" name="cobra_iva" required value="Si">
                                        <label  for="si">Si</label>
                                        <input class="ml-4"  type="radio" id="cobra_iva2" name="cobra_iva" value="No">
                                        <label for="no">No</label><br> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>¿Se entera IVA?<b>*</b></label><br>
                                    <div id="enteraIva">
                                        <input type="radio" id="enteraIva" name="entera_iva" required value="Si">
                                        <label for="si">Si</label>
                                        <input class="ml-4" type="radio" id="entera_iva2" name="entera_iva" value="No">
                                        <label for="no">No</label><br> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Emitirá N/C<b>*</b></label><br>
                                    <div id="emitiraNc">
                                        <input type="radio" id="emitiraNc" name="emitira_nc" required value="Si">
                                        <label for="si">Si</label>
                                        <input class="ml-4"  type="radio" id="emitiraNc2" name="emitira_nc" value="No">
                                        <label for="no">No</label><br> 
                                    </div>
                                </div>
                                <div class="mt-2 col-md-3">
                                    <label>Retención (%)<b>*</b></label>
                                    <input type="number" required class="form-control" min="0"  name="porc_retencion">
                                </div>
                                <div class="mt-2 col-md-3">
                                    <label>Percepció<b>*</b></label>
                        
                                    <div id="percepcion">
                                        <input type="radio" id="percepcion1" name="percepcion" required value="Si">
                                        <label for="si">Si</label>
                                        <input class="ml-4"  type="radio" id="percepcion2" name="percepcion" value="No">
                                        <label for="no">No</label><br> 
                                    </div>
                                </div>
                                <div class="mt-2 col-md-3">
                                    <label>Cuenta Pasivo #1<b>*</b></label>
                                    <input type="text" class="form-control" required name="cta_pasivo_uno">
                                </div>
                                <div class="mt-2 col-md-3">
                                    <label>Cuenta Pasivo #2</label>
                                    <input type="text" class="form-control" name="cta_pasivo_dos">
                                </div>
                                <div class="mt-2 col-md-3">
                                    <label>Cuenta Activo #1<b>*</b></label>
                                    <input type="text" class="form-control" required name="cta_activo_uno">
                                </div>
                                <div class="mt-2 col-md-3">
                                    <label>Cuenta Activo #2</label>
                                    <input type="text" class="form-control" name="cta_activo_dos">
                                </div>
                                <div class="mt-2 col-md-6">
                                    <label>% Comisión<b>*</b></label>
                                    <input type="number"  required class="form-control" min="0" name="comision">
                                </div>
                                <div class="mt-2 col-md-6">
                                    <label>Condiciones de la Operación</label>
                                    <textarea name="condiciones_operacion" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type="submit" value="Crear" class=" mt-5 btn btn-radius btn-azul">
                        </div>
                        </form>    
                    </div>
                    <br>
                        
                            <div>
                                @include('maestros.clienteTable')   
                            </div>
                        
                    <br>

                    
                </section>
            
            </div>
        </x-table>
    </div>


@endsection


@section('scripts')
   
    @if ($alerta == "create"){
        <script>
            toastr["success"]("Maestro Agregado Correctamente", "Operación correcta");
        </script>
    }
    @endif
    @if ($alerta == "update")
        <script>
            toastr["success"]("Maestro Actualizado Correctamente", "Operación correcta");
            toastr["warning"]("Usted cambió los datos del maestro", "Operación correcta");
        </script>
    @endif
    <script type="text/javascript">

        function eliminarM(id_maestro_cliente,id_cliente){
            $('#did_maestro_cliente').val('');
            $('#did_cliente').val('');

            $('#did_maestro_cliente').val(id_maestro_cliente);
            $('#did_cliente').val(id_cliente);
            $('#modalDelete').modal();
        }

        function editarM(id_maestro_cliente,id_cliente, nombre_cliente,numero_cliente_icg,numero_cliente,nombre_comercial,nombre_del_sujeto,direccion,pais,codigo_pais,ciudad,departamento,municipio,telefono_fijo,pagina_web,correo,telefono_celular,paraiso_fiscal,nombre_contacto,cargo_contacto,pagina_web_contacto,correo_contacto,moneda_principal,tipo_cambio,giro_fical_negocio,tipo_contribuyente,nit_niff,n_registro_fiscal,cobra_iva,entera_iva,
            porc_retencion,percepcion,cta_pasivo_uno,cta_pasivo_dos,cta_activo_uno,cta_activo_dos,
            comision,emitira_nc,condiciones_operacion,telefono_contacto){


                $('#fid_maestro_cliente').val('');
                $('#fid_cliente').val(''); 
                $('#fnombre_cliente').val('');
                $('#fnumero_cliente_icg').val('');
                $('#fnumero_cliente').val('');
                $('#fnombre_comercial').val('');
                $('#fnombre_del_sujeto').val('');
                $('#fdireccion').val('');
                $('#fpais').val('');
                $('#fcodigo_pais').val('');
                $('#fciudad').val('');
                $('#fdepartamento').val('');
                $('#fmunicipio').val('');
                $('#ftelefono_fijo').val('');
                $('#fpagina_web').val('');
                $('#fcorreo').val('');
                $('#ftelefono_celular').val('');
                $('#fparaiso_fiscal').val('');
                $('#fnombre_contacto').val('');
                $('#fcargo_contacto').val('');
                $('#fpagina_web_contacto').val('');
                $('#fcorreo_contacto').val('');
                $('#fmoneda_principal').val('');
                $('#ftipo_cambio').val('');
                $('#fgiro_fical_negocio').val('');
                $('#ftipo_contribuyente').val('');
                $('#fnit_niff').val('');
                $('#fn_registro_fiscal').val('');
                $('#fcobra_iva').val('');
                $('#fentera_iva').val('');
                $('#fporc_retencion').val('');
                $('#fpercepcion').val('');
                $('#fcta_pasivo_uno').val('');
                $('#fcta_pasivo_dos').val('');
                $('#fcta_activo_uno').val('');
                $('#fcta_activo_dos').val('');
                $('#fcomision').val('');
                $('#femitira_nc').val('');
                $('#fcondiciones_operacion').val('');
                


                $('#fid_maestro_cliente').val(id_maestro_cliente);
                $('#fid_cliente').val(id_cliente); 
                $('#fnombre_cliente').val(nombre_cliente);
                $('#fnumero_cliente_icg').val(numero_cliente_icg);
                $('#fnumero_cliente').val(numero_cliente);
                $('#fnombre_comercial').val(nombre_comercial);
                //$('#fnombre_del_sujeto').val(nombre_del_sujeto);
                
                document.querySelector("#fnombre_del_sujeto > [value='"+nombre_del_sujeto+"']").checked = true;	
                //fparaiso_fiscal
                $('#fdireccion').val(direccion);
                $('#fpais').val(pais);
                $('#fcodigo_pais').val(codigo_pais);
                $('#fciudad').val(ciudad);
                $('#fdepartamento').val(departamento);
                $('#fmunicipio').val(municipio);
                $('#ftelefono_fijo').val(telefono_fijo);
                $('#fpagina_web').val(pagina_web);
                $('#fcorreo').val(correo);
                $('#ftelefono_celular').val(telefono_celular);
                //$('#fparaiso_fiscal').val(paraiso_fiscal);
                document.querySelector("#fparaiso_fiscal > [value='"+paraiso_fiscal+"']").checked = true;	
                $('#fnombre_contacto').val(nombre_contacto);
                $('#fcargo_contacto').val(cargo_contacto);
                $('#ftelefono_contacto').val(telefono_contacto);//telefono_contacto
                $('#fpagina_web_contacto').val(pagina_web_contacto);
                $('#fcorreo_contacto').val(correo_contacto);
                $('#fmoneda_principal').val(moneda_principal);
                $('#ftipo_cambio').val(tipo_cambio);
                $('#fgiro_fical_negocio').val(giro_fical_negocio);

                // $('#ftipo_contribuyente').val(tipo_contribuyente);
                document.querySelector("#ftipo_contribuyente > [value='"+tipo_contribuyente+"']").checked = true;
                $('#fnit_niff').val(nit_niff);
                $('#fn_registro_fiscal').val(n_registro_fiscal);
                //$('#fcobra_iva').val(cobra_iva);
                document.querySelector("#fcobra_iva > [value='"+cobra_iva+"']").checked = true;
                //$('#fentera_iva').val(entera_iva);
                document.querySelector("#fentera_iva > [value='"+entera_iva+"']").checked = true;
                $('#fporc_retencion').val(porc_retencion);
                //$('#fpercepcion').val(percepcion);
                document.querySelector("#fpercepcion > [value='"+percepcion+"']").checked = true;
                $('#fcta_pasivo_uno').val(cta_pasivo_uno);
                $('#fcta_pasivo_dos').val(cta_pasivo_dos);
                $('#fcta_activo_uno').val(cta_activo_uno);
                $('#fcta_activo_dos').val(cta_activo_dos);
                $('#fcomision').val(comision);
                //$('#femitira_nc').val(emitira_nc);
                document.querySelector("#femitira_nc > [value='"+emitira_nc+"']").checked = true;
                $('#fcondiciones_operacion').val(condiciones_operacion);
                

            $('#modalEdit').modal();
        }
        
        $('#maestroClienteTable').DataTable({
                 
            responsive: true,
            autowidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa :(",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                }
            }
                  
        });
        

        $(document).ready(function() {
              $("#btn1").click(function(){
                toastr["warning"]("Mensaje de prueba", "titulo");
              });   
              
              

              
        });

    </script>
@endsection