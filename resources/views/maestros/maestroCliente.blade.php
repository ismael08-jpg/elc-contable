@extends('layouts.main', ['activePage' => 'maestro-cliente', 'titlePage' => __('Maestro Cliente')])
@section('title', 'Maestro de Cliente')
@section('content')
<style>
    b{
        color: red;
    }

    

    
</style>


@include('maestros.modalDelete')
@include('maestros.modalUpdate')


<div>
    <x-table>
        <div class="row justify-content-center pt-5">
            <h3>Gestión de Maestros de Clientes</h3>
        </div>
        <div class="m-5 my-2">
            <div class="pb-2">
            </div>
            <section style="margin: auto">
                <div class="container-fluid">
                    <form action="{{route('maestroCliente.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <center><h3>Datos generales del cliente</h3></center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre del Cliente<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" name="nombre_cliente" value="{{old('nombre_cliente')}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>N° Cliente ICG<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" name="numero_cliente_icg" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Otro número de cliente</label>
                                        <input type="text" maxlength="50"  class="txt-form" name="numero_cliente">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nombre Comercial <b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" name="nombre_comercial">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nombre del Sujeto<b>*</b></label><br>
                                        <div id="nombre_sujeto" >
                                            <input type="radio"  id="natural" required name="nombre_del_sujeto" value="Natural" >
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
                                        <center><h3 class="mt-3">Persona de Contacto</h3></center>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <label>Nombre<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" required name="nombre_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Cargo<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" required name="cargo_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Página web</label>
                                        <input type="text" maxlength="50"  class="txt-form"  name="pagina_web_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo <b>*</b></label>
                                        <input type="email" placeholder="someone@example.com" class="txt-form" required name="correo_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Teléfono Móvil Contacto</label>
                                        <input type="text" maxlength="50"  class="txt-form" name="telefono_contacto">
                                    </div>
                                    
                                </div>
                        </div>

                            
                            <div class="col-6">
                                <center><h3> Dirección</h3></center>
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <label>Dirección<b>*</b></label>
                                        <textarea maxlength="50" rea class="txt-form" name="direccion" required maxlength="200" cols="20" rows="2">

                                        </textarea maxlength="50" rea>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label>País<b>*</b></label>
                                        <select  class="select-css" required id="txtPais" name="pais">
                                            <option value="">Seleccione un País</option>
                                            @foreach ($pais as $pais)
                                                <option value="{{$pais->id}}">
                                                    {{$pais->nombre_pais}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Código país (según mh)<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" required name="codigo_pais">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Ciudad<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" required name="ciudad">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Departamento/Estado<b>*</b></label>
                                        {{-- <input type="text" maxlength="50"  class="txt-form" required name="departamento"> --}}
                                        <select name="departamento" id="txtEstado" required class="select-css"></select>
                                    </div>

                                    
                                    
                                    <div class="col-md-6">
                                        <label>Municipio</label>
                                        <div id="hiddenMunicipio">
                                            <input type="text" maxlength="50"  id="txtMunicipio" class="txt-form" name="municipio">
                                        </div>
                                        <div id="hiddenSelectMunicipio" >
                                            <select name="municipio" disabled id="selectMunicipio" class="select-css"></select>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12">
                                        <hr>
                                        <center><h3 class="mt-3"> Contacto</h3></center>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <label>Teléfono fijo<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" required name="telefono_fijo">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Página web</label>
                                        <input type="text" maxlength="50"  class="txt-form" name="pagina_web">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo<b>*</b></label>
                                        <input type="email" maxlength="50"  placeholder="someone@example.com"  class="txt-form" required name="correo">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Teléfono Móvil</label>
                                        <input type="text" maxlength="50"  class="txt-form" name="telefono_celular">
                                    </div>
                                </div>

                                
                            </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        
                        <div class="mt-8 col-12"><center><h3 class="mt-10">Informción general</h3></center></div>
                            
                        <div class="col-6">
                                <label>Moneda principal<b>*</b></label>
                                    
                                <select name="moneda_principal" class="select-css" required >
                                    <option value="">Seleccione una moneda</option>
                                    @foreach ($moneda as $m)
                                        <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})">{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Tipo de cambio</label>
                                
                                <select name="tipo_cambio" class="select-css" required >
                                    <option value="">Seleccione un tipo de cambio</option>
                                    @foreach ($moneda as $m)
                                        <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})">{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Giro Fiscal del negocio<b>*</b></label>
                                <input type="text" maxlength="50"  class="txt-form" required name="giro_fical_negocio">
                            </div>
                            <div class="col-md-3">
                                <label>Tipo contribuyente<b>*</b></label><br>
                                <div id="tipoContribuyente">
                                    <input type="radio" id="grande" name="tipo_contribuyente" required value="Grande">
                                    <label for="grande">Grande</label><br>
                                    <input type="radio" id="mediano" name="tipo_contribuyente" value="Mediano">
                                    <label for="mediano">Mediano</label><br> 
                                    <input type="radio" id="otro" name="tipo_contribuyente" value="Pequeño">
                                    <label for="Pequeño">Pequeño</label><br> 
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>NIT/NIFF<b>*</b></label>
                                <div id="hiddenNit_niff">
                                    <input type="text" maxlength="50"  class="txt-form" required id="txtNit_niff" name="nit_niff">
                                </div>
                                <div id="hiddenNitValidado">
                                    <input type="text" maxlength="50"  disabled placeholder="0000-000000-000-0" pattern="[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}" class="txt-form" required id="txtNitValidado" name="nit_niff">
                                </div>
                            </div>

                            

                            <div class="col-md-3">
                                <label>N° Registro fiscal<b>*</b></label>
                                <div id="hiddenNRegistro">
                                    <input type="text" maxlength="50"  class="txt-form" required  name="n_registro_fiscal" required id="txtNRegistro" >
                                </div>
                                <div id="hiddenNRegistroValidado">
                                    <input type="text" maxlength="50"  name="n_registro_fiscal" class="txt-form" disabled placeholder="0000-000000-000-0" pattern="[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}"  required id="nRegistroValidado" >
                                </div>
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
                                <label>Retención Fiscal (%)<b>*</b></label>
                                <input type="number" required class="txt-form" min="0"  name="porc_retencion">
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
                                <input type="text" maxlength="50"  class="txt-form" required name="cta_pasivo_uno">
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Cuenta Pasivo #2</label>
                                <input type="text" maxlength="50"  class="txt-form" name="cta_pasivo_dos">
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Cuenta Activo #1<b>*</b></label>
                                <input type="text" maxlength="50"  class="txt-form" required name="cta_activo_uno">
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Cuenta Activo #2</label>
                                <input type="text" maxlength="50"  class="txt-form" name="cta_activo_dos">
                            </div>
                            <div class="mt-2 col-md-6">
                                <label>% Comisión<b>*</b></label>
                                <input type="number"  required class="txt-form" min="0" name="comision">
                            </div>
                            <div class="mt-2 col-md-6">
                                <label>Condiciones de la Operación</label>
                                <textarea maxlength="50" name="condiciones_operacion" class="txt-form" cols="30" rows="3"></textarea>
                            </div>
                            <div class="mt-2 col-md-6">
                                <label>Condiciones del crédito </label>
                                <textarea name="condiciones_credito" maxlength="50"  class="txt-form" cols="30" rows="3"></textarea>
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

@push('js')

   
@if ($alerta == "create"){
    <script>
        toastr["success"]("Maestro Agregado Correctamente", "Operación correcta");
    </script>
}
@endif
@if ($alerta == "update")
    <script>
        toastr["success"]("Maestro Actualizado Correctamente", "Operación correcta");
        toastr["warning"]("Usted cambió los datos del maestro. Estos cambios no afectaran a las ventas registradas anteriormente a este cambio", "Operación correcta");
    </script>
@endif
@if ($alerta == "deleteError")
    <script>
        toastr["error"]("El maestro no se puede eliminar. Tiene ventas ligadas", "Error");
    </script>
@endif
@if ($alerta == "delete")
    <script>
        toastr["info"]("Maestro Eliminado Correctamente", "Operación correcta");
    </script>
@endif

<script>



    function eliminarM(id_maestro_cliente,id_cliente){
        $('#did_maestro_cliente').val('');
        $('#did_cliente').val('');

        $('#did_maestro_cliente').val(id_maestro_cliente);
        $('#did_cliente').val(id_cliente);
        $('#modalDelete').modal();
    }

    function editarM(id_maestro_cliente,id_cliente, nombre_cliente,numero_cliente_icg,numero_cliente,nombre_comercial,nombre_del_sujeto,direccion,pais,codigo_pais,ciudad,departamento,municipio,telefono_fijo,pagina_web,correo,telefono_celular,paraiso_fiscal,nombre_contacto,cargo_contacto,pagina_web_contacto,correo_contacto,moneda_principal,tipo_cambio,giro_fical_negocio,tipo_contribuyente,nit_niff,n_registro_fiscal,cobra_iva,entera_iva,
        porc_retencion,percepcion,cta_pasivo_uno,cta_pasivo_dos,cta_activo_uno,cta_activo_dos,
        comision,emitira_nc,condiciones_operacion,telefono_contacto,condiciones_credito){



            if(pais=="El Salvador"){
                document.getElementById("fnit_niff").setAttribute("pattern", "[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}");
                document.getElementById("fnit_niff").setAttribute("placeholder", "0000-256359-656-6");
                document.getElementById("fn_registro_fiscal").setAttribute("pattern", "[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}");
                document.getElementById("fn_registro_fiscal").setAttribute("placeholder", "0000-256359-656-6");
            } else{
                document.getElementById("fnit_niff").removeAttribute("pattern");
                document.getElementById("fnit_niff").removeAttribute("placeholder");
                document.getElementById("fn_registro_fiscal").removeAttribute("pattern");
                document.getElementById("fn_registro_fiscal").removeAttribute("placeholder");
            }

            

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
            $('#fcondiciones_credito').val('');
            

            $('#fcondiciones_credito').val(condiciones_credito);
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
        $(function() {  
            $("textarea[maxlength]").bind('input propertychange', function() {  
                var maxLength = $(this).attr('maxlength');  
                if ($(this).val().length > maxLength) {  
                    $(this).val($(this).val().substring(0, maxLength));  
                }  
            })  
        }); 

        $('#hiddenSelectMunicipio').hide();
        $('#hiddenNitValidado').hide();
        $('#hiddenNRegistroValidado').hide();
        

        $('#txtPais').on('change', function(){
            let paisId = $('#txtPais').val();

            if($.trim(paisId) != ''){

                $.get('estados', {paisId: paisId}, function(estados){

                    $('#txtEstado').empty();
                    $('#txtEstado').append("<option value=''>Seleccione una estado</option>");
                    
                    $.each(estados, function(index, value){
                        $('#txtEstado').append("<option value='"+index+"'>"+value+"</option>");
                    });

                });
            }

        });
        
        $('#fpais').on('change', function(){

            let p = $('#fpais').val();
            
            if( p == "El Salvador"){
                document.getElementById("fnit_niff").setAttribute("pattern", "[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}");
                document.getElementById("fnit_niff").setAttribute("placeholder", "0000-256359-656-6");
                document.getElementById("fn_registro_fiscal").setAttribute("pattern", "[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}");
                document.getElementById("fn_registro_fiscal").setAttribute("placeholder", "0000-256359-656-6");
            } else{
                
                document.getElementById("fnit_niff").removeAttribute("pattern");
                document.getElementById("fnit_niff").removeAttribute("placeholder");
                document.getElementById("fn_registro_fiscal").removeAttribute("pattern");
                document.getElementById("fn_registro_fiscal").removeAttribute("placeholder");
            }
            
        });

        

        $('#txtPais').on('change', function(){

            


            let paisId = $('#txtPais').val();

            if(paisId == 51){
                //Municipio
                $('#hiddenMunicipio').hide('slow');
                $('#txtMunicipio').prop('disabled', true);
                $('#hiddenSelectMunicipio').show('slow');
                $('#selectMunicipio').prop('disabled', false);


                //nit y nif
                $('#hiddenNit_niff').hide('slow');
                $('#txtNit_niff').prop('disabled', true);
                $('#hiddenNitValidado').show('slow');
                $('#txtNitValidado').prop('disabled', false);

                //Número de registro fiscal

                $('#hiddenNRegistro').hide('slow');
                $('#txtNRegistro').prop('disabled', true);
                $('#hiddenNRegistroValidado').show('slow');
                $('#nRegistroValidado').prop('disabled', false);


            } else{

                $('#hiddenMunicipio').show('slow');
                $('#txtMunicipio').prop('disabled', false);
                $('#hiddenSelectMunicipio').hide('slow');
                $('#selectMunicipio').prop('disabled', true);

                //nit y nif
                $('#hiddenNit_niff').show('slow');
                $('#txtNit_niff').prop('disabled', false);
                $('#hiddenNitValidado').hide('slow');
                $('#txtNitValidado').prop('disabled', true);

                //Número de registro fiscal
                $('#hiddenNRegistro').show('slow');
                $('#txtNRegistro').prop('disabled', false);
                $('#hiddenNRegistroValidado').hide('slow');
                $('#nRegistroValidado').prop('disabled', true);
            }


        });

        $('#txtEstado').on('change', function(){
            let estadoId = $('#txtEstado').val();

            if($.trim(estadoId) != ''){

                $.get('municipios', {estadoId: estadoId}, function(municipios){

                    $('#selectMunicipio').empty();
                    $('#selectMunicipio').append("<option value=''>Seleccione una Municipio</option>");
                    console.log(municipios);
                    $.each(municipios, function(index, value){
                        $('#selectMunicipio').append("<option value='"+value+"'>"+value+"</option>");
                    });

                });
            }

        });  

    });

</script>

@endpush