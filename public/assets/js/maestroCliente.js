    /*Disculpa por el desorden de código*/
    
    
    
    let validador = 0;

    //disabled radio btns
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
        

    //código de pais automatico
    $('#txtPais').on('change', function(){
        let paisId = $('#txtPais').val();
        let codigo;
        if($.trim(paisId) != ''){

                
                
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
                    document.getElementById("codigoPais").removeAttribute("readonly");
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
        

        //para el select de estados
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


            //elecciona automaticamente el paraiso fiscal de el país
            if($.trim(paisId) != ''){
                let id_p;
                let paraiso_sn;
                $.get('pariso-pais', {paisId: paisId}, function(paraiso){

                    $.each(paraiso, function(index, value){
                        paraiso_sn = value;    
                        id_p = index;
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

                $.get('municipios', {estadoId: estadoId}, function(municipios){

                    $('#selectMunicipio').empty();
                    $('#selectMunicipio').append("<option value=''>Seleccione una Municipio</option>");
                    console.log(municipios);
                    $.each(municipios, function(index, value){
                        $('#selectMunicipio').append("<option value='"+value+"'>"+value+"</option>");
                    });

                });
            }


            //change the state of "paraiso fiscal"
            if(validador == 0){

                if($.trim(estadoId) != ''){
                    let paraisoPais;
                    let paraisoEstado;
                    $.get('pariso-estado', {estadoId: estadoId}, function(paraiso){
    
                        $.each(paraiso, function(index, value){
                            paraisoEstado = value;    
                            paraisoPais = index;
                        });
                        
                        document.querySelector("#paraiso_fiscal > [value='"+paraisoEstado+"']").checked = true;	
                        if(paraisoEstado=="Si"){
                            
                            toastr["info"]("El estado seleccionado es paraiso fiscal");
                            indice_marcado = 0;
                        } else{
                            toastr["info"]("El estado seleccionado NO es paraiso fiscal");
                            indice_marcado = 1;
                        }
                    });
    
                    
                }
            }



        });  

    });
