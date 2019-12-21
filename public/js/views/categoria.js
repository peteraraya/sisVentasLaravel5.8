
/******************************************************/
/*INICIO ventana modal para cambiar estado de Categoria*/

$('#cambiarEstado').on('show.bs.modal', function (event) {

    //console.log('modal abierto');

    var button = $(event.relatedTarget);
    var id_categoria = button.data('id_categoria');
    var modal = $(this);

    modal.find('.modal-body #id_categoria').val(id_categoria);
})

/*FIN ventana modal para cambiar estado de la categoria*/


/*EDITAR CATEGORIA EN VENTANA MODAL*/

$('#abrirmodalEditar').on('show.bs.modal', function (event) {

    //console.log('modal abierto');
    // Cargando la info
    var button = $(event.relatedTarget)
    var nombre_modal_editar = button.data('nombre')
    var descripcion_modal_editar = button.data('descripcion')
    var id_categoria = button.data('id_categoria')
    var modal = $(this)

    // Encuentra dentro del modal body que tenga cada uno de estos elementos
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
    modal.find('.modal-body #id_categoria').val(id_categoria);

})