// Variables declaration
const SELECT_CATALOG = $('#nombreCatalogo');
const NEW_BUTTON = $('#nuevo');
const SAVE_BUTTON_MODAL = $('#save_data_modal');
const SAVE_BUTTON_MODAL_EDIT = $('#edit_catalog');
const DELETE_BUTTON = $('#eliminar');
const EDIT_BUTTON = $('#modificar');
const CANCEL_BUTTON = $('#cancelar');
const T_BODY = $('#datosCatalog');
// End of variables declaration


// Events Listeners
SELECT_CATALOG.on('change', changeCatalog);
SAVE_BUTTON_MODAL.click(addDescription);
SAVE_BUTTON_MODAL_EDIT.click(editDescription);
DELETE_BUTTON.click(deleteDataCatalog);
CANCEL_BUTTON.click(clear);
// End of events Listeners


// Disable buttons
clear();


// ----------------------- [FUNCTIONS] ----------------------- //

// Change catalog and get data catalog
function changeCatalog(e) {
    if ($(this).val() == 'default') {
        T_BODY.html('');
        NEW_BUTTON.prop('disabled', true);
        clear();
    } else {
        getCatalogs();
        clear();
        CANCEL_BUTTON.prop('disabled', true);
        EDIT_BUTTON.prop('disabled', true);
        DELETE_BUTTON.prop('disabled', true);
    }

}

function getCatalogs() {
    NEW_BUTTON.prop('disabled', false)

    $.ajax({

        type: 'POST',
        url: 'controllers/catalogs.controller.php',
        data: {
            action: 'SelectCatalog',
            catalog: $('#nombreCatalogo').val()
        }

    }).done(function (data) {
        $('#datosCatalog').html(data);
    }).fail(function () {
        alert('ERROR en obtener los catalogos');
    });

}


function addDescription(e) {
    e.preventDefault();

    var catalogo = SELECT_CATALOG.val();
    var descripcion = ($('#catalog_data').val()).trim();

    var Cv = 'Cv' + catalogo.substring(1, catalogo.lenght);
    var Ds = 'Ds' + catalogo.substring(1, catalogo.lenght);

    if (descripcion === '') {
        alert("No deje el campo vacio, no sea wey");
        return false;
    }

    if (validateRepeat(catalogo, descripcion, [Cv, Ds])) {
        alert('El dato se encuentra repetido');
        return false;
    }

    $.ajax({
        type: 'POST',
        url: 'controllers/catalogs.controller.php',
        data: {
            action: 'addDescription',
            catalog: catalogo,
            description: descripcion,
            columns: [Cv, Ds]
        }

    }).done(function (data) {
        getCatalogs();
        clear();
        $('#catalog_data').val('');
        $('#add_data').modal('hide');
    }).fail(function () {
        alert('Error');
    });
}

function deleteDataCatalog() {
    const id = $('.seleccionada').attr('id');
    const catalogo = SELECT_CATALOG.val();
    const ColCv = 'Cv' + catalogo.substring(1, catalogo.lenght);

    $.ajax({

        type: 'POST',
        url: 'controllers/catalogs.controller.php',
        data: {
            action: 'Integridad',
            id: id,
            ColCv: ColCv
        }

    }).done(function (res) {
        if (res === 'true') {
            alert('No se puede eliminar, otra tabla esta usando en dato');
        } else {
            const confirm_ = confirm('Estas seguro que deseas eliminar el dato');

            if (confirm_) {
                $.ajax({

                    type: 'POST',
                    url: 'controllers/catalogs.controller.php',
                    data: {
                        action: 'deleteDescription',
                        catalog: catalogo,
                        id: id,
                        ColCv: ColCv
                    }

                }).done(function (data) {
                    getCatalogs();
                    clear();
                }).fail(function () {
                    alert('Error');
                });
            }
        }
    });
}



function editDescription(e) {
    e.preventDefault();

    const id = $('.seleccionada').attr('id');
    const descripcion = ($('#edit_data_field').val()).trim();

    const catalogo = SELECT_CATALOG.val();
    const Cv = 'Cv' + catalogo.substring(1, catalogo.lenght);
    const Ds = 'Ds' + catalogo.substring(1, catalogo.lenght);

    const confirm_ = confirm('Estas seguro que desea editar a ' + $($('#' + id).children()[1]).text());

    if (confirm_) {

        if (descripcion === '') {
            alert("No deje el campo vacio, no sea wey");
            return false;
        }

        var desc_table = $($('#' + id).children()[1]).text();

        if (!(desc_table.toLowerCase() === descripcion.toLowerCase())) {
            if (validateRepeat(catalogo, descripcion, [Cv, Ds])) {
                alert("El dato esta se encuentra repetido");
                return false;
            }
        }

        $.ajax({

            type: 'POST',
            async: false,
            url: 'controllers/catalogs.controller.php',
            data: {
                action: 'editDescription',
                catalog: catalogo,
                description: descripcion,
                id_description: id,
                columns: [Cv, Ds]
            }

        }).done(function (data) {
            getCatalogs();
            clear();
            $('#catalog_data').val('');
            $('#edit_data').modal('hide');
        }).fail(function () {
            alert('Error');
        });
    }
}

function clear() {
    $('.filasTablita').removeClass('seleccionada');
    DELETE_BUTTON.prop('disabled', true);
    EDIT_BUTTON.prop('disabled', true);
    CANCEL_BUTTON.prop('disabled', true);
}


function validateRepeat(catalogo, descripcion, columnas) {
    var re = false;

    $.ajax({

        type: 'POST',
        async: false,
        url: 'controllers/catalogs.controller.php',
        data: {
            action: 'validateNewData',
            catalog: catalogo,
            description: descripcion,
            columns: columnas
        },
        success: function (data) {
            data === 'true' ? re = true : re = false;
        }

    });

    return re;
}

function seleccionar(id_fila) {
    $('.filasTablita').removeClass('seleccionada');
    $('#' + id_fila).addClass('seleccionada');

    CANCEL_BUTTON.removeAttr('disabled');
    EDIT_BUTTON.removeAttr('disabled');
    DELETE_BUTTON.removeAttr('disabled');

    $('#edit_data_field').val($($('#' + id_fila)[0].cells[1]).text());
}

// Developed by Francisco Virbes