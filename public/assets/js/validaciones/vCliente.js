    
    // Teléfono de contacto
    let paisValido = "other";
    let tContacto;
    let contadorValido = 0;

    let quin = 15;

    $( "#tContacto" ).keypress(function() {

        if(paisValido=="us"){
            quin = 16;
        }

        if (event.which < 48 || event.which > 57 || this.value.length === quin) {
            return false;
        }

        if($(this).val().length>0){
            let valor = $(this).val();

            if($(this).val().length==1){
                if(paisValido=="us"){
                    $(this).val("+1("+valor);
                    contadorValido = 1;
                }else{
                    $(this).val("+("+valor);
                    contadorValido = 0;
                }
            }else if($(this).val().length==5+contadorValido){
                $(this).val(valor+")");
            } else if($(this).val().length==10+contadorValido){
                $(this).val(valor+"-");
                
            }else if($(this).val().length>14+contadorValido){
                 

                if(paisValido=="us"){
                    let p1 = $(this).val().slice(2,6);
                    let p2 = $(this).val().slice(7,11);
                    let p3 = $(this).val().slice(12,14);

                  
                    

                    $(this).val("+1("+p1+")"+p2+"-"+p3);

                } else{
                    let p1 = $(this).val().slice(2,5);
                    let p2 = $(this).val().slice(6,10);
                    let p3 = $(this).val().slice(11,15);

                 
                    

                    $(this).val("+("+p1+")"+p2+"-"+p3);
                }


            }
        }
    });

   
        
    //Telefono Fijo (tFijo)
    let tFijo;
    $( "#tFijo" ).keypress(function() {

        if(paisValido=="us"){
            quin = 16;
        }

        if (event.which < 48 || event.which > 57 || this.value.length === quin) {
            return false;
        }

        if($(this).val().length>0){
            let valor = $(this).val();

            if($(this).val().length==1){
                if(paisValido=="us"){
                    $(this).val("+1("+valor);
                    contadorValido = 1;
                }else{
                    $(this).val("+("+valor);
                    contadorValido = 0;
                }
            }else if($(this).val().length==5+contadorValido){
                $(this).val(valor+")");
            } else if($(this).val().length==10+contadorValido){
                $(this).val(valor+"-");
                
            } else if($(this).val().length>14+contadorValido){

                if(paisValido=="us"){
                    let p1 = $(this).val().slice(2,6);
                    let p2 = $(this).val().slice(7,11);
                    let p3 = $(this).val().slice(12,14);

                    
                    

                    $(this).val("+1("+p1+")"+p2+"-"+p3);

                } else{
                    let p1 = $(this).val().slice(2,5);
                    let p2 = $(this).val().slice(6,10);
                    let p3 = $(this).val().slice(11,15);

                    


                    $(this).val("+("+p1+")"+p2+"-"+p3);
                }

            }
        }
    });

    //Telefono Móvil (tMovil)

    let tMovil;
    $( "#tMovil" ).keypress(function() {

        if(paisValido=="us"){
            quin = 16;
        }

        if (event.which < 48 || event.which > 57 || this.value.length === quin) {
            return false;
        }

        if($(this).val().length>0+contadorValido){
            let valor = $(this).val();

            if($(this).val().length==1+contadorValido){
                if(paisValido=="us"){
                    $(this).val("+1("+valor);
                    contadorValido = 1;
                }else{
                    $(this).val("+("+valor);
                    contadorValido = 0;
                }
            }else if($(this).val().length==5+contadorValido){
                $(this).val(valor+")");
            } else if($(this).val().length==10+contadorValido){
                $(this).val(valor+"-");
                
            } else if($(this).val().length>14+contadorValido){

                if(paisValido=="us"){
                    let p1 = $(this).val().slice(2,6);
                    let p2 = $(this).val().slice(7,11);
                    let p3 = $(this).val().slice(12,14);

                    

                    $(this).val("+1("+p1+")"+p2+"-"+p3);

                } else{
                    let p1 = $(this).val().slice(2,5);
                    let p2 = $(this).val().slice(6,10);
                    let p3 = $(this).val().slice(11,15);

                 
                    
                    $(this).val("+("+p1+")"+p2+"-"+p3);
                }
            }
        }
    });

    // NúMERO DE TELÉFONO


    //Validar Nit de EL SALVADOR
    $( "#txtNitValidado" ).keypress(function() {
        
        

        if (event.which < 48 || event.which > 57 || this.value.length === 17) {
            return false;
        }

        //1234-123456-123-1
                //   11
        if($(this).val().length>0){

            let valor = $(this).val();

            if($(this).val().length==4){
                $(this).val(valor+"-"); 
            }else if($(this).val().length==11){

                let p1 = $(this).val().slice(0,4);
                let p2 = $(this).val().slice(5,11);
                
                

                $(this).val(p1+"-"+p2+"-");

                
            }else if($(this).val().length==15){
                let p1 = $(this).val().slice(0,4);
                let p2 = $(this).val().slice(5,11);
                let p3 = $(this).val().slice(12,15);
                // let p3 = $(this).val().slice(16,17);
                $(this).val(p1+"-"+p2+"-"+p3+"-");

            }
        }
                    
        

        
    });

    /// Load País y ESTADO --------
    function loadPais(){
        let paisId = $('#txtPais').val();
       
        if($.trim(paisId) != ''){
            $.get('estados', {paisId: paisId}, function(estados){
                let old = $('#txtEstado').data('old') != '' ?  $('#txtEstado').data('old') : '';
                //alert("Estado Viejo "+old);
                viejo = $('#txtEstado').data('old') != '' ?  $('#txtEstado').data('old') : '';
               
                
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

            //On Paste
            
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
                if(paisId == 55){
                    paisValido = "us";
                    document.getElementById("tFijo").setAttribute("placeholder", "+1(503)0000-0000");
                    document.getElementById("tMovil").setAttribute("placeholder", "+1(503)0000-0000");
                    document.getElementById("tContacto").setAttribute("placeholder", "+1(503)0000-0000");
                }
                else{
                    paisValido = "other";
                    document.getElementById("tFijo").setAttribute("placeholder", "+(503)0000-0000");//
                    document.getElementById("tMovil").setAttribute("placeholder", "+(503)0000-0000");
                    document.getElementById("tContacto").setAttribute("placeholder", "+(503)0000-0000");
                } 
                
                    
                $.get('codigo', {paisId: paisId}, function(codigos){

                    $('#codigoPais').val();
                    
                   
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
    $('#txtEstado').on('change', loadEstado);
   
    

   

    function loadEstado(){
        
        let estadoId = $('#txtEstado').val();

        
        
        
       

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


    /// UPDATE -----------------------------------------------------
    //ftelefono_contacto
    //ftelefono_fijo
    //ftelefono_celular
    //fnit_niff
    
    
    //Cuando cambia El país
    $('#fpais').on('change', function(){

        let p = $('#fpais').val();
        
        if( p == "El Salvador"){
            document.getElementById("fnit_niff").setAttribute("pattern", "[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}");
            document.getElementById("fnit_niff").setAttribute("placeholder", "0000-256359-656-6");
            fpais = "sv"
           
        } else if(p == "Estados Unidos"){
            fpais = "us"
        }
         else{
            fpais = "ot"
            document.getElementById("fnit_niff").removeAttribute("pattern");
            document.getElementById("fnit_niff").removeAttribute("placeholder");
            
        }
        
    });


    //Telefono contacto
    
    $( "#ftelefono_contacto" ).keypress(function() {
        let fcontador=0;
        let num = 15;

        if($("#fpais").val()== "Estados Unidos"){
            num = 16;
            fcontador=1;
        } else{
            num = 15;
            fcontador=0;
        }

        if (event.which < 48 || event.which > 57 || this.value.length === num) {
            return false;
        }

        if($(this).val().length>0){
            let valor = $(this).val();

            if($(this).val().length==1){
                if(fpais == "us"){
                    $(this).val("+1("+valor);
                    fcontador = 1;
                }else{
                    $(this).val("+("+valor);
                    fcontador = 0;
                }
            }else if($(this).val().length==5+fcontador){
                $(this).val(valor+")");
            } else if($(this).val().length==10+fcontador){
                $(this).val(valor+"-");
                
            }else if($(this).val().length>14+fcontador){
                 

                if(paisValido=="us"){
                    let p1 = $(this).val().slice(2,6);
                    let p2 = $(this).val().slice(7,11);
                    let p3 = $(this).val().slice(12,14);

                 

                    $(this).val("+1("+p1+")"+p2+"-"+p3);

                } else{
                    let p1 = $(this).val().slice(2,5);
                    let p2 = $(this).val().slice(6,10);
                    let p3 = $(this).val().slice(11,15);

                   
                    

                    $(this).val("+("+p1+")"+p2+"-"+p3);
                }


            }
        }
    });


    //--------------TELÉFONO FIJO-------------------------

    $( "#ftelefono_fijo" ).keypress(function() {

        
        let fcontador=0;
        let num = 15;

        if($("#fpais").val()== "Estados Unidos"){
            num = 16;
            fcontador=1;
        } else{
            num = 15;
            fcontador=0;
        }

        if (event.which < 48 || event.which > 57 || this.value.length === num) {
            return false;
        }

        if($(this).val().length>0){
            let valor = $(this).val();

            if($(this).val().length==1){
                if(fpais == "us"){
                    $(this).val("+1("+valor);
                    fcontador = 1;
                }else{
                    $(this).val("+("+valor);
                    fcontador = 0;
                }
            }else if($(this).val().length==5+fcontador){
                $(this).val(valor+")");
            } else if($(this).val().length==10+fcontador){
                $(this).val(valor+"-");
                
            }else if($(this).val().length>14+fcontador){
                 

                if(paisValido=="us"){
                    let p1 = $(this).val().slice(2,6);
                    let p2 = $(this).val().slice(7,11);
                    let p3 = $(this).val().slice(12,14);

                    

                    $(this).val("+1("+p1+")"+p2+"-"+p3);

                } else{
                    let p1 = $(this).val().slice(2,5);
                    let p2 = $(this).val().slice(6,10);
                    let p3 = $(this).val().slice(11,15);

                    $(this).val("+("+p1+")"+p2+"-"+p3);
                }


            }
        }
    });

    //----------------TELEFONO CELULAR-----------------------//


    $( "#ftelefono_celular" ).keypress(function() {

        
        let fcontador=0;
        let num = 15;

        if($("#fpais").val()== "Estados Unidos"){
            num = 16;
            fcontador=1;
        } else{
            num = 15;
            fcontador=0;
        }

        if (event.which < 48 || event.which > 57 || this.value.length === num) {
            return false;
        }

        if($(this).val().length>0){
            let valor = $(this).val();

            if($(this).val().length==1){
                if(fpais == "us"){
                    $(this).val("+1("+valor);
                    fcontador = 1;
                }else{
                    $(this).val("+("+valor);
                    fcontador = 0;
                }
            }else if($(this).val().length==5+fcontador){
                $(this).val(valor+")");
            } else if($(this).val().length==10+fcontador){
                $(this).val(valor+"-");
                
            }else if($(this).val().length>14+fcontador){
                 

                if(paisValido=="us"){
                    let p1 = $(this).val().slice(2,6);
                    let p2 = $(this).val().slice(7,11);
                    let p3 = $(this).val().slice(12,14);

                   

                    $(this).val("+1("+p1+")"+p2+"-"+p3);

                } else{
                    let p1 = $(this).val().slice(2,5);
                    let p2 = $(this).val().slice(6,10);
                    let p3 = $(this).val().slice(11,15);

                  

                    $(this).val("+("+p1+")"+p2+"-"+p3);
                }


            }
        }
    });

     //Validar Nit de EL SALVADOR ---------------
     $( "#fnit_niff" ).keypress(function() {
        
        if($("#fpais").val()== "El Salvador"){

            if (event.which < 48 || event.which > 57 || this.value.length === 17) {
                return false;
            }
    
            if($(this).val().length>0){
    
                let valor = $(this).val();
    
                if($(this).val().length==4){
                    $(this).val(valor+"-"); 
                }else if($(this).val().length==11){
    
                    let p1 = $(this).val().slice(0,4);
                    let p2 = $(this).val().slice(5,11);
                    
                    
    
                    $(this).val(p1+"-"+p2+"-");
    
                    
                }else if($(this).val().length==15){
                    let p1 = $(this).val().slice(0,4);
                    let p2 = $(this).val().slice(5,11);
                    let p3 = $(this).val().slice(12,15);
                 
                    $(this).val(p1+"-"+p2+"-"+p3+"-");
    
                }
            }
           
        } 

        
                    
        

        
    });

   
        
    