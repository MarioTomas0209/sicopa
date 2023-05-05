// Variables declaration
const NEW_BUTTON = $('#nuevo');
const DELETE_BUTTON = $('#eliminar');
const EDIT_BUTTON = $('#modificar');
const CANCEL_BUTTON = $('#cancelar');

const SAVE_BUTTON_MODAL = $('#save_data_app');
const SAVE_BUTTON_MODAL_EDIT = $('#edit_catalog');

const CV_APP = $('#cv_aplicacion');
const DS_APP = $('#ds_aplicacion');
// End of variables declaration

// Events listeners
SAVE_BUTTON_MODAL.click(saveApp);
DELETE_BUTTON.click(delete_app);
EDIT_BUTTON.click(edit_app);
CANCEL_BUTTON.click(clear);
// End of events listenerslert('hola');

function saveApp(e) {
    e.preventDefault();

    if (CV_APP.val() == '' || DS_APP.val() == '') {
        swal({
            type: "error",
            title: '¡Error!',
            text: 'Todos los campos son obligatorios',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            return false;
        });

        return false;
    }


    SAVE_BUTTON_MODAL.prop('disabled', true)
    $('#add_data').modal('hide');;

    $.ajax({
        type: 'POST',
        url: 'controllers/applications.controller.php',
        data: {
            action: 'addApplication',
            cv_application: CV_APP.val(),
            ds_application: DS_APP.val()
        }
    }).done(function (data) {
        $('#data_appications').html(data);
        CV_APP.val('');
        DS_APP.val('');
        SAVE_BUTTON_MODAL.prop('disabled', false);
    }).fail(function () {
        alert('Error');
    });

}

function delete_app(e) {
    e.preventDefault();
    const id = $('.seleccionada').attr('id');

    const name = $('#' + id).children()[1];

    const confirm_ = confirm('¿Estas seguro que deseas eliminar a ' + $(name).text() + '?');

    if (confirm_) {
        clear();

        swal({
            type: "success",
            title: 'En desarrollo',
            text: 'Accion de eliminar en desarrollo | not working',
            showCancelButton: false,
            confirmButtonColor: 'gray',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            return false;
        });
        
    }
}

function edit_app(e) {
    e.preventDefault();
    swal({
        type: "success",
        title: 'En desarrollo',
        text: 'Accion de editar en desarrollo | not working',
        showCancelButton: false,
        confirmButtonColor: 'gray',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        return false;
    });
}




function clear() {
    $('.filasTablita').removeClass('seleccionada');
    DELETE_BUTTON.prop('disabled', true);
    EDIT_BUTTON.prop('disabled', true);
    CANCEL_BUTTON.prop('disabled', true);
}

function seleccionar(id_fila) {
    $('.filasTablita').removeClass('seleccionada');
    $('#' + id_fila).addClass('seleccionada');

    CANCEL_BUTTON.removeAttr('disabled');
    EDIT_BUTTON.removeAttr('disabled');
    DELETE_BUTTON.removeAttr('disabled');


    console.log(id_fila);
}
