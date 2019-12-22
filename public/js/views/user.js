
/*EDITAR USUARIO EN VENTANA MODAL*/
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
    /*este id_rol_modal_editar selecciona la categoria*/
    var id_rol_modal_editar = button.data('id_rol')
    var usuario_modal_editar = button.data('usuario')
    //var password_modal_editar = button.data('password')
    var id_usuario = button.data('id_usuario')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    /*los # son los id que se encuentran en el formulario*/
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
    modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
    modal.find('.modal-body #direccion').val(direccion_modal_editar);
    modal.find('.modal-body #telefono').val(telefono_modal_editar);
    modal.find('.modal-body #email').val(email_modal_editar);
    modal.find('.modal-body #id_rol').val(id_rol_modal_editar);
    modal.find('.modal-body #usuario').val(usuario_modal_editar);
    //modal.find('.modal-body #password').val(password_modal_editar);
    modal.find('.modal-body #id_usuario').val(id_usuario);
})

/*INICIO ventana modal para cambiar el estado del usuario*/

$('#cambiarEstado').on('show.bs.modal', function (event) {

    //console.log('modal abierto');

    var button = $(event.relatedTarget)
    var id_usuario = button.data('id_usuario')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)

    modal.find('.modal-body #id_usuario').val(id_usuario);
})

/*FIN ventana modal para cambiar estado del usuario*/

