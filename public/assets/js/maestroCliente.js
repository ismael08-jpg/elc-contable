    
   
   /*Disculpa por el desorden de código*/
    var viejo = 255;
    $('#hiddenSelectMunicipio').hide();
    $('#hiddenNitValidado').hide();
    $('#hiddenNRegistroValidado').hide();
        


    $(document).ready(function() {
        
        $(function() {  
            $("textarea[maxlength]").bind('input propertychange', function() {  
                var maxLength = $(this).attr('maxlength');  
                if ($(this).val().length > maxLength) {  
                    $(this).val($(this).val().substring(0, maxLength));  
                }  
            })  
        }); 

        
        
          

    });



    $('#btnConfirm').on('click', function(){
        $('#confirme').empty();
        $('#confirme').append('Número de cliente: <b>'+$('#numero_cliente_icg').val()+'</b><br>');
        $('#confirme').append('Otro número de clientr: <b>'+$('#numero_cliente').val()+'</b><br>');
        $('#confirme').append('Nombre comercial: <b>'+$('#nombre_comercial').val()+'</b><br>');

        $('#confirme').append('Nombre del sujeto: <b>'+$('input[name="nombre_del_sujeto"]:checked').val()+'</b><br>');
       
        $('#confirme').append('Dirección: <b>'+$('#direccion').val()+'</b><br>');
        $('#confirme').append('País: <b>'+$('#txtPais').val()+'</b><br>');
        $('#confirme').append('Código del país sugún mh: <b>'+$('#codigoPais').val()+'</b><br>');
        $('#confirme').append('Ciudad<b>'+$('#ciudad').val()+'</b><br>');
        $('#confirme').append('Departamento <b>'+$('#txtEstado').val()+'</b><br>');

        
        if($('#txtPais').val()=="51"){
            $('#confirme').append('Municipio: <b>'+$('#selectMunicipio').val()+'</b><br>');
        }else{
            $('#confirme').append('Municipio: <b>'+$('#txtMunicipio').val()+'</b><br>');
        }
        $('#confirme').append('Teléfono fijo: <b>'+$('#tFijo').val()+'</b><br>');
        $('#confirme').append('Página web: <b>'+$('#pagina_web').val()+'</b><br>');
        $('#confirme').append('Correo: <b>'+$('#correo').val()+'</b><br>');
        $('#confirme').append('Teléfono móvil: <b>'+$('#tMovil').val()+'</b><br>');

        var para = "No";
        if(indice_marcado == 1){
            para = "No";
        }else{
            para = "Si";
        }
        $('#confirme').append('Paraiso Fiscal: <b>'+para+'</b><br>');
        $('#confirme').append('Nombre Contacto: <b>'+$('#nombre_contacto').val()+'</b><br>');
        $('#confirme').append('Cargo Contacto: <b>'+$('#cargo_contacto').val()+'</b><br>');
        $('#confirme').append('Página web contacto: <b>'+$('#pagina_web_contacto').val()+'</b><br>');
        $('#confirme').append('Coreo contacto: <b>'+$('#correo_contacto').val()+'</b><br>');
        $('#confirme').append('Moneda Principal: <b>'+$('#moneda_principal').val()+'</b><br>');
        $('#confirme').append('Tipo de cambio: <b>'+$('#tipo_cambio').val()+'</b><br>');
        $('#confirme').append('Giro fical del negocio: <b>'+$('#giro_fical_negocio').val()+'</b><br>');
        $('#confirme').append('Tipo contribuyente: <b>'+$('input[name="tipo_contribuyente"]:checked').val()+'</b><br>');
        if($('#txtPais').val()=="51"){
            $('#confirme').append('Nit o Niff: <b>'+$('#txtNitValidado').val()+'</b><br>');
            $('#confirme').append('Número de registro fiscal: <b>'+$('#nRegistroValidado').val()+'</b><br>');
        }else{
            $('#confirme').append('Nit o Niff: <b>'+$('#txtNit_niff').val()+'</b><br>');
            $('#confirme').append('Número de registro fiscal: <b>'+$('#txtNRegistro').val()+'</b><br>');
        }    
        $('#confirme').append('Cobra IVA: <b>'+$('#cobraIva').val()+'</b><br>');
        $('#confirme').append('Entera IVA: <b>'+$('#enteraIva').val()+'</b><br>');
        $('#confirme').append('Porcentaje Retención: <b>'+$('#porc_retencion').val()+'</b><br>');
        $('#confirme').append('Percepción: <b>'+$('input[name="percepcion"]:checked').val()+'</b><br>');
        $('#confirme').append('Cuenta Pasivo #1: <b>'+$('#cta_pasivo_uno').val()+'</b><br>');
        $('#confirme').append('Cuenta Pasivo #2: <b>'+$('#cta_pasivo_dos').val()+'</b><br>');
        $('#confirme').append('Cuenta Activo #1: <b>'+$('#cta_activo_uno').val()+'</b><br>');
        $('#confirme').append('Cuenta Activo #2: <b>'+$('#cta_activo_dos').val()+'</b><br>');
        $('#confirme').append('Comisión: <b>'+$('#comision').val()+'%</b><br>');
        $('#confirme').append('Emitirá NC: <b>'+$('#emitiraNc').val()+'</b><br>');
        $('#confirme').append('Condiciones de la operación: <b>'+$('#condiciones_operacion').val()+'</b><br>');
        $('#confirme').append('Condiciones del crédito: <b>'+$('#condiciones_credito').val()+'</b><br>');
        
        $('#confirme').append('Nombre del Cliente: <b>'+$('#nombre_cliente').val()+'</b><br>');
        $('#modalConfirm').modal();
    });
    
    //Botón de Sow y hide nuevo cliente
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



    //Valida los prarisos fiscales
    //si el país es paraiso fiscal, no se toman en cuenta sus estados/deptos para evaluar si es paraiso.
    let validador = 0;

    //Codigo para deshabilitar los radiobotones
    let indice_marcado = 1;
    function des(formulario,idradio){
        formulario.paraiso_fiscal[indice_marcado].checked = true;
        formulario.paraiso_fiscal[idradio].blur();
    }

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

    
   
      

    
    
    //eliminar maestros
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
                
            } else{
                document.getElementById("fnit_niff").removeAttribute("pattern");
                document.getElementById("fnit_niff").removeAttribute("placeholder");
                
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

    
    

    //datatables
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
