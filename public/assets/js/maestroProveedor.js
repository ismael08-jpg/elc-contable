


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
        "lengthMenu": "Mostrar _MENU_ registros por p??gina",
        "zeroRecords": "Nada encontrado - disculpa :(",
        "info": "Mostrando la p??gina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar:",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior",
        }
    }
          
});





let fpais;
   
/*Disculpa por el desorden de c??digo*/
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
     $('#confirme').append('N??mero de proveedor: <b>'+$('#numero_proveedor_icg').val()+'</b><br>');
     $('#confirme').append('Otro n??mero de proveedor: <b>'+$('#numero_proveedor').val()+'</b><br>');
     $('#confirme').append('Nombre comercial: <b>'+$('#nombre_comercial').val()+'</b><br>');

     $('#confirme').append('Nombre del sujeto: <b>'+$('input[name="nombre_del_sujeto"]:checked').val()+'</b><br>');
    
     $('#confirme').append('Direcci??n: <b>'+$('#direccion').val()+'</b><br>');
     $('#confirme').append('Pa??s: <b>'+$('#txtPais').val()+'</b><br>');
     $('#confirme').append('C??digo del pa??s sug??n mh: <b>'+$('#codigoPais').val()+'</b><br>');
     $('#confirme').append('Ciudad<b>'+$('#ciudad').val()+'</b><br>');
     $('#confirme').append('Departamento <b>'+$('#txtEstado').val()+'</b><br>');

     
     if($('#txtPais').val()=="51"){
         $('#confirme').append('Municipio: <b>'+$('#selectMunicipio').val()+'</b><br>');
     }else{
         $('#confirme').append('Municipio: <b>'+$('#txtMunicipio').val()+'</b><br>');
     }
     $('#confirme').append('Tel??fono fijo: <b>'+$('#tFijo').val()+'</b><br>');
     $('#confirme').append('P??gina web: <b>'+$('#pagina_web').val()+'</b><br>');
     $('#confirme').append('Correo: <b>'+$('#correo').val()+'</b><br>');
     $('#confirme').append('Tel??fono m??vil: <b>'+$('#tMovil').val()+'</b><br>');

     var para = "No";
     if(indice_marcado == 1){
         para = "No";
     }else{
         para = "Si";
     }
     $('#confirme').append('Paraiso Fiscal: <b>'+para+'</b><br>');
     $('#confirme').append('Nombre Contacto: <b>'+$('#nombre_contacto').val()+'</b><br>');
     $('#confirme').append('Cargo Contacto: <b>'+$('#cargo_contacto').val()+'</b><br>');
     $('#confirme').append('P??gina web contacto: <b>'+$('#pagina_web_contacto').val()+'</b><br>');
     $('#confirme').append('Coreo contacto: <b>'+$('#correo_contacto').val()+'</b><br>');
     $('#confirme').append('Moneda Principal: <b>'+$('#moneda_principal').val()+'</b><br>');
     $('#confirme').append('Tipo de cambio: <b>'+$('#tipo_cambio').val()+'</b><br>');
     $('#confirme').append('Giro fical del negocio: <b>'+$('#giro_fical_negocio').val()+'</b><br>');
     $('#confirme').append('Tipo contribuyente: <b>'+$('input[name="tipo_contribuyente"]:checked').val()+'</b><br>');
     if($('#txtPais').val()=="51"){
         $('#confirme').append('Nit o Niff: <b>'+$('#txtNitValidado').val()+'</b><br>');
         $('#confirme').append('N??mero de registro fiscal: <b>'+$('#nRegistroValidado').val()+'</b><br>');
     }else{
         $('#confirme').append('Nit o Niff: <b>'+$('#txtNit_niff').val()+'</b><br>');
         $('#confirme').append('N??mero de registro fiscal: <b>'+$('#txtNRegistro').val()+'</b><br>');
     }    
     $('#confirme').append('Cobra IVA: <b>'+$('input[name="cobra_iva"]:checked').val()+'</b><br>');
     $('#confirme').append('Entera IVA: <b>'+$('input[name="entera_iva"]:checked').val()+'</b><br>');

     $('#confirme').append('Porcentaje Retenci??n: <b>'+$('#porc_retencion').val()+'</b><br>');
     $('#confirme').append('Percepci??n: <b>'+$('input[name="percepcion"]:checked').val()+'</b><br>');
     $('#confirme').append('Cuenta Pasivo #1: <b>'+$('#cta_pasivo_uno').val()+'</b><br>');
     $('#confirme').append('Cuenta Pasivo #2: <b>'+$('#cta_pasivo_dos').val()+'</b><br>');
     $('#confirme').append('Cuenta Activo #1: <b>'+$('#cta_activo_uno').val()+'</b><br>');
     $('#confirme').append('Cuenta Activo #2: <b>'+$('#cta_activo_dos').val()+'</b><br>');
     $('#confirme').append('Comisi??n: <b>'+$('#comision').val()+'%</b><br>');
     $('#confirme').append('Emitir?? NC: <b>'+$('#emitiraNc').val()+'</b><br>');
     $('#confirme').append('Condiciones de la operaci??n: <b>'+$('#condiciones_operacion').val()+'</b><br>');
     $('#confirme').append('Condiciones del cr??dito: <b>'+$('#condiciones_credito').val()+'</b><br>');
     
     $('#confirme').append('Nombre del Cliente: <b>'+$('#nombre_cliente').val()+'</b><br>');
     $('#modalConfirm').modal();
 });
 
 //Bot??n de Sow y hide nuevo cliente
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
 //si el pa??s es paraiso fiscal, no se toman en cuenta sus estados/deptos para evaluar si es paraiso.
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
                 toastr["info"]("El pa??s seleccionado tiene c??digo: "+codigo);
             }else{
                 toastr["warning"]("No ha establecido un c??digo para el pa??s seleccionado");
                 $('#fcodigo_pais').val('');
             }

         });
     }

 });

 

 

 //datatables
 $('#maestroClienteTable').DataTable({
          
     responsive: true,
     autowidth: false,

     "language": {
         "lengthMenu": "Mostrar _MENU_ registros por p??gina",
         "zeroRecords": "Nada encontrado - disculpa :(",
         "info": "Mostrando la p??gina _PAGE_ de _PAGES_",
         "infoEmpty": "No hay registros disponibles",
         "infoFiltered": "(filtrado de _MAX_ registros totales)",
         "search": "Buscar:",
         "paginate": {
             "next": "Siguiente",
             "previous": "Anterior",
         }
     }
           
 });
