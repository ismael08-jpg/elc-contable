    
    let validador = 0;
    let indice_marcado = 1;
    function des(formulario,idradio){
        formulario.paraiso_fiscal[indice_marcado].checked = true;
        formulario.paraiso_fiscal[idradio].blur();
    }


     //Botón de Sow y hide nuevo proveedor
     let banderaHide = 0;
     $("#nuevoMaestro").hide('slow'); 
      
     $('#btnNuenvoMaestro').on('click', function(){
         if(banderaHide==0){
             $("#nuevoMaestro").show('slow'); 
             banderaHide = 1;
         }else{
             $("#nuevoMaestro").hide('slow'); 
             banderaHide = 0;
         }
     });


    $('#fpais').on('change', function(){
        let pais = $('#fpais').val();
        let codigo;
        if($.trim(pais) != ''){

                
                
            $.get('codigoPais', {pais: pais}, function(codigos){

                $('#fcodigo_pais').val();
                
                console.log(codigos);
                $.each(codigos, function(index, value){
                    codigo = value;
                });

                if(codigo != null){
                    $('#fcodigo_pais').val(codigo);
                    document.getElementById("fcodigo_pais").setAttribute("readonly", true);
                    toastr["info"]("El país seleccionado tiene código: "+codigo);
                }else{
                    toastr["warning"]("No ha establecido un código para el país seleccionado");
                    $('#fcodigo_pais').val('');
                }

            });
        }

    });

   


    //
    $('#txtPais').on('change', function(){
        let paisId = $('#txtPais').val();
        let codigo;
        if($.trim(paisId) != ''){

            // Código de telefono
            if(paisId != "Estados Unidos")
            {
                document.getElementById("tFijo").setAttribute("pattern", "[0-9]{11}");
                document.getElementById("tFijo").setAttribute("placeholder", "50300000000");//

                document.getElementById("tMovil").setAttribute("pattern", "[0-9]{11}");
                document.getElementById("tMovil").setAttribute("placeholder", "50300000000");

                document.getElementById("tContacto").setAttribute("pattern", "[0-9]{11}");
                document.getElementById("tContacto").setAttribute("placeholder", "50300000000");
            } else{
                document.getElementById("tFijo").setAttribute("pattern", "[0-9]{12}");
                document.getElementById("tFijo").setAttribute("placeholder", "150300000000");

                document.getElementById("tMovil").setAttribute("pattern", "[0-9]{12}");
                document.getElementById("tMovil").setAttribute("placeholder", "150300000000");

                document.getElementById("tContacto").setAttribute("pattern", "[0-9]{12}");
                document.getElementById("tContacto").setAttribute("placeholder", "150300000000");
            }

            if(paisId != "Estados Unidos")
            {
                document.getElementById("tFijo").setAttribute("pattern", "[0-9]{11}");
                document.getElementById("tFijo").setAttribute("placeholder", "00088888888");
            } else{
                document.getElementById("tFijo").setAttribute("pattern", "[0-9]{12}");
                document.getElementById("tFijo").setAttribute("placeholder", "000088887777");
            }
                
                
            $.get('codigo', {paisId: paisId}, function(codigos){

                $('#codigoPais').val();
                
                console.log(codigos);
                $.each(codigos, function(index, value){
                    codigo = value;
                });

                if(codigo != null){
                    $('#codigoPais').val(codigo);
                    document.getElementById("codigoPais").setAttribute("readonly", true);
                    toastr["info"]("El país seleccionado tiene código: "+codigo);
                }else{
                    toastr["warning"]("No ha establecido un código para el país seleccionado");
                    $('#codigoPais').val('');
                }

            });
        }

    }); 












function eliminarM(id_maestro_proveedor,id_proveedor){
    $('#did_maestro_proveedor').val('');
    $('#did_proveedor').val('');

    $('#did_maestro_proveedor').val(id_maestro_proveedor);
    $('#did_proveedor').val(id_proveedor);
    $('#ProveedorModalDelete').modal();
}

function editarM(id_maestro_proveedor,id_proveedor, nombre_proveedor,numero_proveedor_icg,numero_proveedor,nombre_comercial,nombre_del_sujeto,direccion,pais,codigo_pais,ciudad,departamento,municipio,telefono_fijo,pagina_web,correo,telefono_celular,paraiso_fiscal,nombre_contacto,cargo_contacto,pagina_web_contacto,correo_contacto,moneda_principal,tipo_cambio,giro_fical_negocio,tipo_contribuyente,nit_niff,n_registro_fiscal,cobra_iva,entera_iva,
    porc_retencion,percepcion,cta_pasivo_uno,cta_pasivo_dos,cta_activo_uno,cta_activo_dos,
    comision,emitira_nc,condiciones_operacion,telefono_contacto, condiciones_credito){

        if(pais=="El Salvador"){
            document.getElementById("fnit_niff").setAttribute("pattern", "[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}");
            document.getElementById("fnit_niff").setAttribute("placeholder", "0000-256359-656-6");
            //document.getElementById("fn_registro_fiscal").setAttribute("pattern", "[0-9]{7}");
            //document.getElementById("fn_registro_fiscal").setAttribute("placeholder", "0000000");
        } else{
            document.getElementById("fnit_niff").removeAttribute("pattern");
            document.getElementById("fnit_niff").removeAttribute("placeholder");
            //document.getElementById("fn_registro_fiscal").removeAttribute("pattern");
            //document.getElementById("fn_registro_fiscal").removeAttribute("placeholder");
        }

        $('#fid_maestro_proveedor').val('');
        $('#fid_proveedor').val(''); 
        $('#fnombre_proveedor').val('');
        $('#fnumero_proveedor_icg').val('');
        $('#fnumero_proveedor').val('');
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
        $('#fid_maestro_proveedor').val(id_maestro_proveedor);
        $('#fid_proveedor').val(id_proveedor); 
        $('#fnombre_proveedor').val(nombre_proveedor);
        $('#fnumero_proveedor_icg').val(numero_proveedor_icg);
        $('#fnumero_proveedor').val(numero_proveedor);
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
        

    $('#ProveedorModalEdit').modal();
}

$('#maestroProveedorTable').DataTable({
         
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

    

    $('#fpais').on('change', function(){

        let p = $('#fpais').val();

        if( p == "El Salvador"){
            document.getElementById("fnit_niff").setAttribute("pattern", "[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}");
            document.getElementById("fnit_niff").setAttribute("placeholder", "0000-256359-656-6");
           
        } else{
            
            document.getElementById("fnit_niff").removeAttribute("pattern");
            document.getElementById("fnit_niff").removeAttribute("placeholder");
           
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

            //Dejamos caer los municipios
            $.get('municipios', {estadoId: estadoId}, function(municipios){

                $('#selectMunicipio').empty();
                $('#selectMunicipio').append("<option value=''>Seleccione una Municipio</option>");
                console.log(municipios);
                $.each(municipios, function(index, value){
                    $('#selectMunicipio').append("<option value='"+value+"'>"+value+"</option>");
                });

            });


            // Establecemos si el estado es paraiso fiscal o no lo es.
            if(validador == 0){
                let paraisoEstado;
                $.get('pariso-estado', {estadoId: estadoId}, function(paraiso){

                    $.each(paraiso, function(index, value){
                        paraisoEstado = value;    
                        
                    });
                    document.querySelector("#paraiso_fiscal > [value='"+paraisoEstado+"']").checked = true;	
                    if(paraisoEstado=="Si"){
                        toastr["info"]("El estado seleccionado es paraiso fiscal");
                        indice_marcado = 0;
                        validador = 1;
                    } else{
                        toastr["info"]("El estado seleccionado NO es paraiso fiscal");
                        indice_marcado = 1;
                        validador = 0;
                    }
                });
            }
        }

        
        

    });  


    // Cuando cambia el país establecemos si es paraiso fiscal
    $('#txtPais').on('change', function(){
        let paisId = $('#txtPais').val();

        if($.trim(paisId) != ''){

            //-- Dejamos caer los estados del país seleccionado
            $.get('estados', {paisId: paisId}, function(estados){

                $('#txtEstado').empty();
                $('#txtEstado').append("<option value=''>Seleccione una estado</option>");
                
                $.each(estados, function(index, value){
                    $('#txtEstado').append("<option value='"+index+"'>"+value+"</option>");
                });

            });


            // Establecemos si es paraiso fiscal o no - ñaña
            let paraiso_sn;
            $.get('pariso-pais', {paisId: paisId}, function(paraiso){

                $.each(paraiso, function(index, value){
                    paraiso_sn = value;    
                    
                });

                

                document.querySelector("#paraiso_fiscal > [value='"+paraiso_sn+"']").checked = true;	

                if(paraiso_sn=="Si"){
                        
                    toastr["info"]("El país seleccionado es paraiso fiscal.");
                    indice_marcado = 0;
                    validador = 1;
                } else{
                    toastr["info"]("El país seleccionado NO es paraiso fiscal.");
                    indice_marcado = 1;
                    validador = 0;
                }
            });
        }


    });



});
