// Variables declaration
const TIP_PERSON = document.getElementById('TipPerson');

const NEW_BUTTON = document.getElementById('nuevo');
const DELETE_BUTTON = document.getElementById('eliminar');
const EDIT_BUTTON = document.getElementById('modificar');
const CANCEL_BUTTON = document.getElementById('cancelar');

const CURP = document.getElementById('curp');
const RFC = document.getElementById('rfc');
const EMAIL = document.getElementById('email');
const NOMBRE = document.getElementById('nombre');
const APE_PAT = document.getElementById('ApePat');
const APE_MAT = document.getElementById('ApeMat');
const FEC_NAC = document.getElementById('fecha');
const GENERO = document.getElementById('genero');
const TELEFONO = document.getElementById('telefono');
const ESTADO = document.getElementById('estado');
const MUNICIPIO = document.getElementById('municipio');
const COLONIA = document.getElementById('colonia');
const CALLE = document.getElementById('calle');
const NUMERO = document.getElementById('numero');
const CP = document.getElementById('cp');
// End of variables declaration


// Events Listeners
CURP.addEventListener('blur', repeatCURP);
NEW_BUTTON.addEventListener('click', addNewPerson);
DELETE_BUTTON.addEventListener('click', deletePerson);
EDIT_BUTTON.addEventListener('click', editPerson);
CANCEL_BUTTON.addEventListener('click', cancelar);
// End of events Listeners


// Settings for inputs
enableComponents(false);
validateRfcCurp();
setFecMax();
// End of settings for inputs


/** --------------- Logic validate curp Repeat ----------------  */
function repeatCURP() {
    if ($('#nuevo').text().trim() == 'Grabar') {

        if (($('#curp').val()).length == 18) {

            let curp = $('#curp').val();

            $.ajax({

                type: 'POST',
                url: 'controllers/datperson.controller.php',
                data: {
                    action: "existsCURP",
                    curp: curp
                }

            }).done(function (result) {

                if (result) {
                    let data = JSON.parse(result);
                    let ques = '¿Qué desea hacer con ' + data.DsNombre + ' ' + data.DsApellido + '?';


                    swal({

                        title: '¡Curp repetida!',
                        text: ques,
                        type: 'warning',
                        showCancelButton: true,
                        showCloseButton: true,

                        confirmButtonColor: '#7367F0',
                        confirmButtonText: 'Editar',

                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Eliminar'

                    }).then((result) => {

                        if (result.dismiss == 'close' || result.dismiss == 'overlay' || result.dismiss == 'esc') {
                            $('#curp').val('');
                        } else if (result.dismiss == 'cancel') {
                            // Eliminar
                            $.ajax({

                                type: 'POST',
                                url: 'controllers/datperson.controller.php',
                                data: {
                                    action: 'deleteByCurp',
                                    CvPerson: data.CvPerson
                                }

                            }).done(function (result) {
                                enableComponents(false);
                                clearComponents();
                                getDataTable();

                                swal({
                                    type: 'success',
                                    title: 'Se ha eliminado ' + data.DsNombre + ' ' + data.DsApellido,
                                    showConfirmButton: false,
                                    timer: 1200
                                });

                            }).fail(function () {
                                alert('ERROR');
                            });

                        } else if (result.value) {
                            // Editar
                            showData(data.CvPerson);
                            clearErrors();
                            $('#nuevo').html('<i class="bi bi-check-circle"></i> Guardar');
                            $('.componentes').removeClass('errors');
                            $('#' + data.CvPerson).addClass('seleccionada');
                            $('#curp').prop('disabled', true);
                        }

                    });
                }

            }).fail(function () {
                alert('ERROR');
            });

        }
    }

}
/** ------------- END Logic validate curp Repeat --------------  */


/** ------------- Logic Add New Person --------------  */
function addNewPerson() {

    if ($('#nuevo').text().trim() == 'Nuevo') {

        enableComponents(true);
        clearComponents();
        $('#nuevo').css('background-color', 'green').html('<i class="bi bi-check-circle"></i> Grabar');
        $('.filasTablita').removeClass('seleccionada');
        $('#eliminar').prop('disabled', true);
        $('#modificar').prop('disabled', true);

    } else if ($('#nuevo').text().trim() == 'Grabar') {

        let data = getData();

        if (!data) {
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
        }

        if (data) {
            data.action = 'add';

            $.ajax({

                type: 'POST',
                url: 'controllers/datperson.controller.php',
                data: data

            }).done(function (result) {
                enableComponents(false);
                clearComponents();
                getDataTable();
                alert('Agregado con éxito');
            }).fail(function () {
                alert('ERROR');
            });

        }

    }

}

function getData() {

    const TipPerson = $('#TipPerson').val();

    const Curp = $('#curp').val();
    const Rfc = $('#rfc').val();
    const Email = $('#email').val();
    const Name = $('#nombre').val();
    const LastName = $('#ApePat').val();
    const MotherLastName = $('#ApeMat').val();
    const Date = $('#fecha').val();
    const Gender = $('#genero').val();
    const Phone = $('#telefono').val();

    const State = $('#estado').val();
    const Municipality = $('#municipio').val();
    const Suburb = $('#colonia').val();
    const Street = $('#calle').val();
    const Number = $('#numero').val();
    const PostalCode = $('#cp').val();

    const data = {
        "TipPerson": TipPerson,
        "Name": Name,
        "LastName": LastName,
        "MotherLastName": MotherLastName,
        "Date": Date,
        "Gender": Gender,
        "Phone": Phone,
        "Email": Email,
        "Curp": Curp,
        "Rfc": Rfc,
        "State": State,
        "Municipality": Municipality,
        "Suburb": Suburb,
        "Street": Street,
        "Number": Number,
        "PostalCode": PostalCode
    };

    return validateData(data);
}

function validateData(data) {

    if (data.TipPerson == 0) {
        return false;
    }

    if (data.Curp == '' || data.Curp.length < 18) {
        return false;
    }

    if (data.Rfc != '') {
        if (data.Rfc.length < 13) {
            return false;
        }
    }

    if (data.Name == 0) {
        return false;
    }

    if (data.LastName == 0) {
        return false;
    }

    if (data.MotherLastName == 0) {
        return false;
    }

    let now = new Date();
    let new_date = new Date(data.Date);
    let year = new_date.getFullYear();

    if (data.Date == '' || year < 1950 || now < new_date) {
        return false;
    }

    if (data.Gender == 0) {
        return false;
    }

    if (data.Phone == '') {
        return false;
    }

    if (data.Matricula == '') {
        return false;
    }

    if (data.Email == '' || validateEmail(data.Email)) {
        alert('Email invalido');
        return false;
    }

    if (data.Street == 0) {
        return false;
    }

    if (data.Suburb == 0) {
        return false;
    }

    if (data.Municipality == 0) {
        return false;
    }

    if (data.State == 0) {
        return false;
    }

    if (data.PostalCode == '') {
        return false;
    }

    return data;
}
/** ----------- End Logic Add New Person ------------  */


/** ------------- Logic Delete a person in table mPersona --------------  */
function deletePerson() {
    let id = $('.seleccionada').attr('id');

    $.ajax({

        type: 'POST',
        url: 'controllers/datperson.controller.php',
        data: { action: 'existsUser', id: id }

    }).done(function (res) {

        if (JSON.parse(res)) {

            swal({
                type: "error",
                title: "¡No se puede eliminar!",
                text: "El registro completa otra tabla",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            });

        } else {

            swal({
                type: "warning",
                title: '¿Estas seguro?',
                text: 'Se eliminara a ' + $($('#' + id).children()[0]).text().trim() + ' ' + $($('#' + id).children()[1]).text().trim(),
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
            }).then((result) => {

                if (result.value) {

                    $.ajax({

                        type: 'POST',
                        url: 'controllers/datperson.controller.php',
                        data: { action: 'delete', id: id }

                    }).done(function (res) {
                        getDataTable();
                    }).fail(function () {
                        alert('ERROR');
                    });

                    enableComponents(false);
                    clearComponents();

                }

            });
        }

    });

}
/** ----------- End Logic Delete a person in table mPersona ------------  */


/** --------------- Logic Edit a person in table mPersona ----------------  */
function editPerson() {
    if ($('#modificar').text().trim() == 'Modificar') {

        $('#modificar').html('<i class="bi bi-check-circle"></i> Guardar');
        enableComponents(true);
        $('#curp').prop('disabled', true);
        $('#nuevo').prop('disabled', true);
        $('#eliminar').prop('disabled', true);


    } else if ($('#modificar').text().trim() == 'Guardar') {

        swal({
            type: "warning",
            title: '¿Seguro que desea guardar los cambios?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
        }).then((result) => {

            if (result.value) {

                let data = getData();

                if (!data) {
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
                }

                if (data) {
                    data.action = 'edit';
                    data.CvPerson = $('.seleccionada').attr('id');

                    $.ajax({

                        type: 'POST',
                        url: 'controllers/datperson.controller.php',
                        data: data

                    }).done(function (result) {
                        getDataTable();
                        cancelar();
                        $('#modificar').html('<i class="bi bi-pencil-square"></i> Modificar');
                    }).fail(function () {
                        alert('ERROR');
                    });
                }

            } else {
                cancelar();
            }

        }
        );

    }


}
/** ------------- End Logic Edit a person in table mPersona --------------  */


/** ------------- Logic Cancelar Button --------------  */
function cancelar() {
    $('.filasTablita').removeClass('seleccionada');
    enableComponents(false);
    clearComponents();
}
/** ----------- End Logic Cancelar Button ------------  */


// Select Row in table mPersonas
function selectRow(id_fila) {
    showData(id_fila);

    $('.filasTablita').removeClass('seleccionada');
    $('#' + id_fila).addClass('seleccionada');

    enableComponents(false);

    $('#eliminar').prop('disabled', false);
    $('#modificar').prop('disabled', false);
    $('#cancelar').prop('disabled', false);

    $('#CurpError').text('Ingrese una CURP');
}


/** ------------- Show Data in Components (Inputs, Selects) --------------  */
function showData(id_fila) {

    $.ajax({

        type: 'POST',
        url: 'controllers/datperson.controller.php',
        data: { action: 'getDataPerson', id: id_fila }

    }).done(function (result) {
        setData(JSON.parse(result));

    }).fail(function () {
        alert('ERROR al mostrar la informacion de la persona');
    });

}

function setData(data) {
    $('#TipPerson').val(data.CvTipPerson);
    $('#curp').val(data.Curp);
    $('#rfc').val(data.Rfc);
    $('#email').val(data.Email);
    $('#nombre').val(data.CvNombre);
    $('#ApePat').val(data.CvApePat);
    $('#ApeMat').val(data.CvApeMat);
    $('#fecha').val(data.FecNac);
    $('#genero').val(data.CvGenero);
    $('#telefono').val(data.Telefono);
    $('#estado').val(data.CvEstado);
    $('#municipio').val(data.CvMunicipio);
    $('#colonia').val(data.CvColonia);
    $('#calle').val(data.CvCalle);
    $('#numero').val(data.Numero);
    $('#cp').val(data.Cp);
}
/** ----------- End Show Data in Components (Inputs, Selects) ------------  */






/** --------------- Clear Components ----------------  */
function clearComponents() {
    $('input').val('');
    $('select').val('0');
    $('#nuevo').html('<i class="bi bi-plus-lg"></i> Nuevo');
}
/** ------------- End Clear Components --------------  */



function getDataTable() {

    $.ajax({

        type: 'POST',
        url: 'controllers/datperson.controller.php',
        data: { action: 'getDataTable' }

    }).done(function (result) {
        $('#PeopleTable').html(result);
    }).fail(function () {
        alert('ERROR');
    });

}


/** ------------- Validations --------------  */
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return !re.test(email.trim());
}

function validateRfcCurp() {
    $('#curp, #rfc').bind('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    $('#cp, #telefono').bind('keypress', function (event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}
/** ------------- END Validar campos de texto (RFC, CURP) --------------  */




function setFecMax(id) {
    Date.prototype.toDateInputValue = (function () {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });

    $('#fecha').prop('max', new Date().toDateInputValue());
}

// Enable & Disable Componets
function enableComponents(value) {
    $('input').prop('disabled', !value);
    $('select').prop('disabled', !value);
    $('button').prop('disabled', !value);

    NEW_BUTTON.removeAttribute('disabled');
}