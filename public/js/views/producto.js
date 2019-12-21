/*EDITAR PRODUCTO EN VENTANA MODAL*/
$('#abrirmodalEditar').on('show.bs.modal', function (event) {

    //console.log('modal abierto');
    /*el button.data es lo que está en el button de editar*/
    var button = $(event.relatedTarget)
    /*este id_categoria_modal_editar selecciona la categoria*/
    var id_categoria_modal_editar = button.data('id_categoria')
    var nombre_modal_editar = button.data('nombre')
    var precio_venta_modal_editar = button.data('precio_venta')
    var codigo_modal_editar = button.data('codigo')
    var stock_modal_editar = button.data('stock')
    //var imagen_modal_editar = button.data('imagen1')
    var id_producto = button.data('id_producto')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    /*los # son los id que se encuentran en el formulario*/
    modal.find('.modal-body #id').val(id_categoria_modal_editar);
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #precio_venta').val(precio_venta_modal_editar);
    modal.find('.modal-body #codigo').val(codigo_modal_editar);
    modal.find('.modal-body #stock').val(stock_modal_editar);
    // modal.find('.modal-body #subirImagen').html("<img src="img/producto/imagen_modal_editar">");
    modal.find('.modal-body #id_producto').val(id_producto);
})

/*INICIO ventana modal para cambiar el estado del producto*/

$('#cambiarEstado').on('show.bs.modal', function (event) {

    //console.log('modal abierto');

    var button = $(event.relatedTarget)
    var id_producto = button.data('id_producto')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)

    modal.find('.modal-body #id_producto').val(id_producto);
})

/*FIN ventana modal para cambiar estado del producto*/