/*INICIO ventana modal para cambiar estado de Compra*/

$('#cambiarEstadoCompra').on('show.bs.modal', function (event) {

    //console.log('modal abierto');

    var button = $(event.relatedTarget)
    var id_compra = button.data('id_compra')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)

    modal.find('.modal-body #id_compra').val(id_compra);
})

/*FIN ventana modal para cambiar estado de la compra*/
