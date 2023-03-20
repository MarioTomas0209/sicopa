$(document).ready(function () {

    $('#nuevo').click(addNewUser);
    $('#save_new_user').click(saveModalNewUser);
    $('#eliminar').click(eliminar);
    $('#modificar').click(modificar);
    $('#cancelar').click(cancelar);

    $('#eye').mousedown(e => {
        e.preventDefault();
        $('#Password').prop('type', 'text');
    });

    $('#eye').mouseup(e => {
        e.preventDefault();
        $('#Password').prop('type', 'password');
    });

    $('#FecIni').on('change', function () {
        miniFec($(this));
    });

    $('#Login').bind('keypress', function (event) {
        validateInputLogin(event);
    });

});

/** --------------- Logic Add New User ----------------  */
function addNewUser() {
    enableComponents(true);
    cancelar();
    setFecIni_FecFin();
    setDateToday();

    $('#eliminar, #modificar, #cancelar').prop('disabled', true);
    $('#EdoCta').prop('checked', true);

    $('#add_data_user').text('Insertar datos');
}

function saveModalNewUser(e) {
    e.preventDefault();

    if ($('#add_data_user').text() === 'Insertar datos') {
        saveData();
    } else {
        saveEdit();
    }

}

function saveData() {
    var data = getData();

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
        return false;
    }

    $.ajax({

        type: 'POST',
        url: 'controllers/usuarios.controller.php',
        data: {
            action: 'validateUsername',
            Username: data.Login,
            Password: data.Password
        }

    }).done(function (res) {

        if (res == 'username') {

            swal({
                type: "error",
                title: '¡Error!',
                text: 'Ya existe un registro con ese usuario',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                $('#Login').focus();
            });

        } else if (res == 'password') {

            swal({
                type: "error",
                title: '¡Error!',
                text: 'Ya existe una registro con esa contraseña',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                $('#Password').focus();
            });

        } else if (res == 'none') {

            if (data) {
                data.action = 'addNewUser';

                $.ajax({

                    type: 'POST',
                    url: 'controllers/usuarios.controller.php',
                    data: data

                }).done(function (res) {
                    getDataTable();
                    clearComponents();
                    enableComponents(false);
                    $('#add_user').modal('hide');
                }).fail(function () {

                });

            }

        }

    });
}

function getData() {

    const NameUser = $('#nameUser').val();

    const Login = $('#Login').val();
    const Password = $('#Password').val();
    const FecIni = $('#FecIni').val();
    const FecFin = $('#FecFin').val();
    const EdoCta = $('#EdoCta').is(':checked');

    const data = {
        "NameUser": NameUser,
        "Login": Login,
        "Password": Password,
        "FecIni": FecIni,
        "FecFin": FecFin,
        "EdoCta": EdoCta
    };

    return validateData(data);
}

function validateData(data) {

    if (data.NameUser === '0') {
        return false;
    }

    if (data.Login === '') {
        return false;
    }

    if (data.Password === '') {
        return false;
    }

    return data;
}
/** ------------- End Logic Add New User --------------  */


/** ------------------- Logic Eliminar --------------------  */
function eliminar() {
    let filaSeleccionada = $('.seleccionada').attr('id');

    swal({
        type: "warning",
        title: '¿Estas seguro?',
        text: 'Se eliminara a: ' + $($('#' + filaSeleccionada).children()[1]).text(),
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
    }).then((result) => {

        if (result.value) {

            $.ajax({

                type: 'POST',
                url: 'controllers/usuarios.controller.php',
                data: { action: 'delete', id: filaSeleccionada }

            }).done(function (result) {
                getDataTable();
            }).fail(function () {
                alert('ERROR');
            });

            enableComponents(false);
            clearComponents();

        }

    });
}
/** ----------------- End Logic Eliminar ------------------  */


/** ------------------- Logic Modificar --------------------  */
function modificar() {
    $('#add_data_user').text('Editar datos');
    $('#add_user').modal('show');
    enableComponents(true);
}

function saveEdit() {
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
                return false;
            }

            $.ajax({

                type: 'POST',
                url: 'controllers/usuarios.controller.php',
                data: {
                    action: 'validateUsername',
                    e: $('.seleccionada').attr('id'),
                    Username: data.Login,
                    Password: data.Password
                }

            }).done(function (res) {

                if (res == 'username') {

                    swal({
                        type: "error",
                        title: '¡Error!',
                        text: 'Ya existe un registro con ese usuario',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        $('#Login').focus();
                    });

                } else if (res == 'password') {

                    swal({
                        type: "error",
                        title: '¡Error!',
                        text: 'Ya existe una registro con esa contraseña',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        $('#Password').focus();
                    });

                } else if (res == 'none') {

                    if (data) {
                        data.action = 'edit';
                        data.CvUser = $('.seleccionada').attr('id');

                        $.ajax({

                            type: 'POST',
                            url: 'controllers/usuarios.controller.php',
                            data: data

                        }).done(function (result) {
                            $('#add_user').modal('hide');
                            cancelar();
                            getDataTable();
                        }).fail(function () {
                            alert('ERROR');
                        });

                    }

                }

            });
        }
    });
}
/** ----------------- End Logic Modificar ------------------  */


/** ----------------- Logic Cancelar ------------------  */
function cancelar() {
    clearComponents();
    $('.filasTablita').removeClass('seleccionada');
    $('#eliminar, #modificar, #cancelar').prop('disabled', true);
}
/** --------------- End Logic Cancelar ----------------  */


/** --------------- Clear Components ----------------  */
function clearComponents() {
    $('.default').prop('selected', true);
    $('input').val('');
    $('#EdoCta').prop('checked', false);

    clearErrors();
}
/** ------------- End Clear Components --------------  */



/** ------------- Enable & Disable Componets --------------  */
function enableComponents(value) {
    $('input').prop('disabled', !value);
    $('select').prop('disabled', !value);
    $('button').prop('disabled', !value);

    $('#nuevo').prop('disabled', false);
}
/** ----------- END Enable & Disable Componets ------------  */


/** ------------- Activar Mensajes de error --------------  */
function errors_msg(errors) {

    clearErrors();

    $('.v-er').addClass('errors');

    errors.forEach(element => {

        if (element == 'FecIniError' || element == 'FecFinError') {
            $('#' + element).css('display', 'block').css('margin-left', '33%').css('margin-right', '37%');
        } else {
            $('#' + element).css('display', 'block').css('margin-left', '38%').css('margin-right', '12%');
        }

    });

}

function clearErrors() {
    const errors = ['NombreUsuarioError', 'LoginUsuarioError', 'PasswordUsuarioError', 'FecIniError', 'FecFinError'];

    errors.forEach(element => {
        $('#' + element).css('display', 'none');
    });
}
/** ----------- End Activar Mensajes de error ------------  */


/** ----------------- Logic Set Date Today ------------------  */
function setDateToday() {
    Date.prototype.toDateInputValue = (function () {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });
    document.getElementById('FecIni').value = new Date().toDateInputValue();

    $('#FecFin').val(sumaFecha(5, $('#FecIni').val()));
}
function sumaFecha(d, fecha) {

    var Fecha = new Date();
    var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() + 1) + "/" + Fecha.getFullYear());
    var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
    var aFecha = sFecha.split(sep);
    var fecha = aFecha[0] + '/' + aFecha[1] + '/' + aFecha[2];
    fecha = new Date(fecha);
    fecha.setDate(fecha.getDate() + parseInt(d));
    var anno = fecha.getFullYear();
    var mes = fecha.getMonth() + 1;
    var dia = fecha.getDate();
    mes = (mes < 10) ? ("0" + mes) : mes;
    dia = (dia < 10) ? ("0" + dia) : dia;
    var fechaFinal = anno + sep + mes + sep + dia;

    return fechaFinal;
}
/** --------------- End Logic Set Date Today ----------------  */



/** --------------- Get Data (Table) ----------------  */
function getDataTable() {

    $.ajax({

        type: 'POST',
        url: 'controllers/usuarios.controller.php',
        data: { action: 'getUsers' }

    }).done(function (result) {
        $('#UsersTable').html(result);
    }).fail(function () {
        alert('ERROR');
    });

}
/** ------------- End Get Data (Table) --------------  */



/** ------------- Select Row in table Users --------------  */
function selectRow(id_fila) {
    clearErrors();
    showData(id_fila);

    $('.filasTablita').removeClass('seleccionada');
    $('#' + id_fila).addClass('seleccionada');

    enableComponents(false);

    $('#eliminar').prop('disabled', false);
    $('#modificar').prop('disabled', false);
    $('#cancelar').prop('disabled', false);
}
/** ------------- End Select Row in table Users --------------  */
/** ------------- Show Data in Components (Inputs, Selects) --------------  */
function showData(id_fila) {
    $.ajax({

        type: 'POST',
        url: 'controllers/usuarios.controller.php',
        data: { action: 'getDataUser', id: id_fila }

    }).done(function (result) {
        setData(JSON.parse(result));
    }).fail(function () {
        alert('ERROR');
    });

}
function setData(data) {
    $('#nameUser').val(data.CvPerson);
    $('#Login').val(data.Login);
    $('#Password').val(data.Password);
    $('#FecIni').val(data.FecIni);
    $('#FecFin').val(data.FecFin);

    if (data.EdoCta == 1) {
        $('#EdoCta').prop('checked', true);
    } else {
        $('#EdoCta').prop('checked', false);
    }

    let now = new Date();
    now.setHours(0, 0, 0, 0);
    now.setDate(now.getDate());

    let year = now.getFullYear();
    let month = now.getMonth() + 1;
    let day = now.getDate();

    month = (month < 10) ? ("0" + month) : month;
    day = (day < 10) ? ("0" + day) : day;

    let min = year + '-' + month + '-' + day;

    $('#FecIni').prop('min', min);

    // ---
    let FecFini = new Date(data.FecIni);
    FecFini.setHours(0, 0, 0, 0);
    FecFini.setDate(FecFini.getDate() + 1);

    let yearr = FecFini.getFullYear();
    let monthh = FecFini.getMonth() + 1;
    let dayy = FecFini.getDate();

    monthh = (monthh < 10) ? ("0" + monthh) : monthh;
    dayy = (dayy < 10) ? ("0" + dayy) : dayy;

    let mini = yearr + '-' + monthh + '-' + dayy;

    $('#FecFin').prop('min', mini);
}
/** ----------- End Show Data in Components (Inputs, Selects) ------------  */




/** --------------- Validate FecIni & FecFin ----------------  */
function setFecIni_FecFin() {

    let today = new Date();

    let year = today.getFullYear();
    let month = today.getMonth() + 1;
    let day = today.getDate();

    month = (month < 10) ? ("0" + month) : month;
    day = (day < 10) ? ("0" + day) : day;

    let min = year + '-' + month + '-' + day;

    $('input[type="date"]').prop('min', min);

}
/** ------------- END Validate FecIni & FecFin --------------  */


function miniFec(FecIni) {
    $('#FecFin').prop('min', $(FecIni).val());
    $('#FecFin').val(sumaFecha(5, $(FecIni).val()));
}

function validateInputLogin(event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
}