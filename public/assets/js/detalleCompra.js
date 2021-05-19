$(document).ready(function(){
            
    $('#detalleTable').DataTable({
        
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

$('#precioUnitario').on('change', function(){
    let = precioU = $('#precioUnitario').val();
    let = cant = $('#cantidad').val();

    let subTotal = (precioU*cant);

    $('#subTotal').val(subTotal);
   
});

$('#uprecio_unitario').on('change', function(){
    let = precioU = $('#uprecio_unitario').val();
    let = cant = $('#ucantidad').val();
    let subTotal = (precioU*cant);
    $('#usubTotal').val(subTotal);
   
});


function editarD(id_detalle_compra, id_compra,descripcion, precio_unitario,cantidad, presupuesto){
    $('#uid_detalle_compra').val(id_detalle_compra);
    $('#uid_compra').val(id_compra);
    $('#udescripcion').val(descripcion);
    $('#uprecio_unitario').val(precio_unitario);
    $('#ucantidad').val(cantidad);
    $('#upresupuesto').val(presupuesto);
    $('#usubTotal').val(cantidad*precio_unitario);
    $('#detalleEdit').modal();
}

function eliminarD(id_detalle_compra, id_compra){
    $('#did_detalle_compra').val(id_detalle_compra);
    $('#did_compra').val(id_compra);
    $('#detalleDelete').modal();
}