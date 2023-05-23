// Variables declaration
const NEW_BUTTON = $('#nuevo');
const DELETE_BUTTON = $('#eliminar');
const EDIT_BUTTON = $('#modificar');
const CANCEL_BUTTON = $('#cancelar');

const SAVE_BUTTON_MODAL = $('#save_data_app');
const SAVE_BUTTON_MODAL_EDIT = $('#edit_app');

const CV_APP = $('#cv_aplicacion');
const DS_APP = $('#ds_aplicacion');

const EDIT_CV_APP = $('#edit_cv_aplicacion');
const EDIT_DS_APP = $('#edit_ds_aplicacion');
// End of variables declaration

// Events listeners
SAVE_BUTTON_MODAL.click(saveApp);
SAVE_BUTTON_MODAL_EDIT.click(editApp);
DELETE_BUTTON.click(delete_app);
EDIT_BUTTON.click(show_modal_edit);
CANCEL_BUTTON.click(clear);
CV_APP.keyup(enableSave);
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
        }).then((result) => { });

        return false;
    }

    if (isRepeatValue(CV_APP.val())) return false;
    if (existsParent(CV_APP.val())) return false;

    SAVE_BUTTON_MODAL.prop('disabled', true);

    $('#add_data').modal('hide');

    $.ajax({
        type: 'POST',
        url: 'controllers/applications.controller.php',
        data: {
            action: 'addApplication',
            cv_application: CV_APP.val(),
            ds_application: DS_APP.val()
        }
    }).done(function (data) {
        window.location.reload();
    }).fail(function () {
        alert('Error');
    });

}

function delete_app(e) {
    e.preventDefault();
    const id = $('.seleccionada').attr('id');
    const name = $('#' + id).children()[1];

    swal({
        type: "warning",
        title: '¿Estas seguro?',
        text: 'Deseas eliminar ' + name.textContent,
        showCancelButton: true,
        cancelButtonColor: 'black',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
    }).then((result) => {

        if (result.value) {

            if (!validateIntegriti()) {
                $.ajax({
                    type: 'POST',
                    url: 'controllers/applications.controller.php',
                    data: { action: 'deleteApp', id: id }
                }).done(function (data) {
                    window.location.reload();
                }).fail(function () {
                    alert('Error');
                });
            }
        }

    });


}

function show_modal_edit() {
    const id = $('.seleccionada').attr('id');

    $.ajax({
        type: 'POST',
        url: 'controllers/applications.controller.php',
        data: {
            action: 'getValuesEdit',
            id: id
        }
    }).done(function (data) {

        const response = JSON.parse(data);

        EDIT_CV_APP.val(response.cv_application);
        EDIT_DS_APP.val(response.ds_application);

    }).fail(function () {
        alert('Error');
    });

    $('#edit_data').modal('show');
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
}

function isRepeatValue(value) {
    let response = false;

    $.ajax({
        type: 'POST',
        url: 'controllers/applications.controller.php',
        async: false,
        data: {
            action: 'validate_no_repeat',
            data: value
        }
    }).done(function (data) {
        if (data == 'exists') {
            swal({
                type: "error",
                title: '¡Error!',
                text: 'La clave ya se encuentra en uso',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            });

            response = true;
        }
    }).fail(function () {
        alert('Error');
    });

    return response;
}

function existsParent(value) {
    if (value.substring(4, 8) == '0000') return false;

    let response = true;
    const first_key = value.substring(0, 4);

    $.ajax({
        type: 'POST',
        url: 'controllers/applications.controller.php',
        async: false,
        data: {
            action: 'search_module',
            data: first_key + '0'
        }
    }).done(function (data) {
        if (data == 'exists') {
            response = false;
        }
    }).fail(function () {
        alert('Error');
    });

    if (response) {

        swal({
            type: "error",
            title: '¡Error!',
            text: 'Debe agregar el modulo principal',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    }

    return response;
}

function editApp(e) {
    e.preventDefault();

    if (EDIT_CV_APP.val() == '' || EDIT_DS_APP.val() == '') {
        swal({
            type: "error",
            title: '¡Error!',
            text: 'Todos los campos son obligatorios',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });

        return false;
    }


    $.ajax({
        type: 'POST',
        url: 'controllers/applications.controller.php',
        data: {
            action: 'editApplication',
            id: $('.seleccionada').attr('id'),
            cv_application: EDIT_CV_APP.val(),
            ds_application: EDIT_DS_APP.val()
        }
    }).done(function (data) {
        window.location.reload();
    }).fail(function () {
        alert('Error');
    });

}

function validateIntegriti() {
    const id = $('.seleccionada').attr('id');
    let response = false;

    $.ajax({
        type: 'POST',
        url: 'controllers/applications.controller.php',
        async: false,
        data: {
            action: 'integrity',
            id: id
        }
    }).done(function (data) {
        console.log(data);
        if (data == 'exists') {
            response = true;
        }

    }).fail(function () {
        alert('Error');
    });

    if (response) {
        swal({
            type: "error",
            title: '¡Error!',
            text: 'No se puede eliminar porque el dato se esta usando',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    }

    return response;
}

function enableSave() {
    const string = $(this).val();
    SAVE_BUTTON_MODAL.prop('disabled', string.length !== 8);
}