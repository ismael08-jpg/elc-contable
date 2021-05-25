    /*Disculpa por el desorden de código*/
    var viejo = 255;
    $('#hiddenSelectMunicipio').hide();
    $('#hiddenNitValidado').hide();
    $('#hiddenNRegistroValidado').hide();
        

    

    function loadPais(){
        let paisId = $('#txtPais').val();
       
        if($.trim(paisId) != ''){
            $.get('estados', {paisId: paisId}, function(estados){
                let old = $('#txtEstado').data('old') != '' ?  $('#txtEstado').data('old') : '';
                //alert("Estado Viejo "+old);
                viejo = $('#txtEstado').data('old') != '' ?  $('#txtEstado').data('old') : '';
                console.log(viejo);
                $('#test').val($('#txtEstado').data('old') != '' ?  $('#txtEstado').data('old') : '');
                $('#txtEstado').empty();
                $('#txtEstado').append("<option value=''>Seleccione una estado</option>");
                $.each(estados, function(index, value){
                    $('#txtEstado').append("<option value='"+index+"'"+ (old == index ? 'selected' : '') +">"+value+"</option>");
                });
            });

            //elecciona automaticamente el paraiso fiscal de el país
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


        //Validaciones
            

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


            


                //Código de país en automatico

               
                let codigo;
            

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
                
                    
                $.get('codigo', {paisId: paisId}, function(codigos){

                    $('#codigoPais').val();
                    
                    //console.log(codigos);
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

        loadEstado();
    }



    
    loadPais();
    
    
    //para el select de estados
    $('#txtPais').on('change', loadPais);
    
   
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

   

    function loadEstado(){
        
        let estadoId = $('#txtEstado').val();

        
        console.log(estadoId);
       

        if($.trim(estadoId) != ''){

            $.get('municipios', {estadoId: estadoId}, function(municipios){
                let old = $('#selectMunicipio').data('old') != '' ?  $('#selectMunicipio').data('old') : '';
                $('#selectMunicipio').empty();
                $('#selectMunicipio').append("<option value=''>Seleccione una Municipio</option>");
      
               
                $.each(municipios, function(index, value){
                    $('#selectMunicipio').append("<option value='"+value+"'"+(old == value ? 'selected' : '')+">"+value+"</option>");
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

        
    }


    
    


    
    $('#txtEstado').on('change', loadEstado);

    // $("#registrar").on("click", function(){
    //     // $('#question').append("<input type='hidden' name='id' value='"+variable+"'><input type='hidden' name='bandera' value='1'><input type='hidden' name='ide' value='"+id+"'>");
    //     $('#frm').submit();
    // });

    

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
