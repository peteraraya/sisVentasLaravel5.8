
/*EDITAR CLIENTE EN VENTANA MODAL*/
$('#abrirmodalEditar').on('show.bs.modal', function (event) {

    //console.log('modal abierto');
    /*el button.data es lo que está en el button de editar*/
    var button = $(event.relatedTarget)

    var nombre_modal_editar = button.data('nombre')
    var tipo_documento_modal_editar = button.data('tipo_documento')
    var num_documento_modal_editar = button.data('num_documento')
    var direccion_modal_editar = button.data('direccion')
    var telefono_modal_editar = button.data('telefono')
    var email_modal_editar = button.data('email')
    var id_cliente = button.data('id_cliente')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    /*los # son los id que se encuentran en el formulario*/
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
    modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
    modal.find('.modal-body #direccion').val(direccion_modal_editar);
    modal.find('.modal-body #telefono').val(telefono_modal_editar);
    modal.find('.modal-body #email').val(email_modal_editar);
    modal.find('.modal-body #id_cliente').val(id_cliente);
})