/*INICIO ventana modal para cambiar estado de Venta*/

$('#cambiarEstadoVenta').on('show.bs.modal', function (event) {

    //console.log('modal abierto');

    var button = $(event.relatedTarget)
    var id_venta = button.data('id_venta')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)

    modal.find('.modal-body #id_venta').val(id_venta);
})

/*FIN ventana modal para cambiar estado de la venta*/
