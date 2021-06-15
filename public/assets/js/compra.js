$(document).ready(function(){
            
    $('#ventaTable').DataTable({
        
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

   
    
    
});


function editarC(id_compra, id_proveedor, credito_fiscal, monto_com, 
    concepto_com, fecha_emision, fecha_vencimiento ){

    $('#id_compra').val(id_compra);
    $('#id_proveedor').val(id_proveedor);
    $('#credito_fiscal').val(credito_fiscal);
    $('#monto_com').val(monto_com);
    $('#concepto_com').val(concepto_com);
    $('#fecha_emision').val(fecha_emision);
    $('#fecha_vencimiento').val(fecha_vencimiento);

    $('#compraEdit').modal();


}

function eliminarC(id_compra){
    $('#did_compra').val(id_compra);
    $('#compraDelete').modal();
}

//Para marcar como pagado el IVA
function pagarIva (id, date){
   
    $('#mFecha_pago_iva').val("");
    $('#mId_compra').val("");

    $('#mId_compra').val(id);

    if(date != 'no')
        $('#mFecha_pago_iva').val(date);
    

    $('#pagarIva').modal();
    
}

//Para marcar como pagado la retención
function pagarRetencion (id, date){
   
    $('#rFecha_pago_retencion').val("");
    $('#rId_compra').val("");

    $('#rId_compra').val(id);

    if(date != 'no')
        $('#rFecha_pago_retencion').val(date);
    

    $('#pagarRetencion').modal();
    
}


//Para marcar como pagado la Comisión
function cobrarComision (id, date){
   
    $('#cFecha_pago_comision').val("");
    $('#cId_compra').val("");

    $('#cId_compra').val(id);

    if(date != 'no')
        $('#cFecha_pago_comision').val(date);
    

    $('#cobrarComision').modal();
    
}