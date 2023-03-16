$(document).ready(function() {

    $('#nuevo').click(addNewUser);
    $('#eliminar').click(eliminar);
    $('#modificar').click(modificar);
    $('#cancelar').click(cancelar);

    $('#eye').mousedown(function() {
        $('#Password').prop('type', 'text');
    });

    $('#eye').mouseup(function() {
        $('#Password').prop('type', 'password');
    });

    $('#FecIni').on('change', function() {
        miniFec($(this));
    });

    $('#Login').bind('keypress', function(event) {
        validateInputLogin(event);
    });

});

/** --------------- Logic Add New User ----------------  */
function addNewUser() {
    if ($('#nuevo').text().trim() == 'Nuevo') {
        cancelar();
        setFecIni_FecFin();
        clearComponents();
        enableComponents(true);
        setDateToday();
        $('#nuevo').text('Grabar').css('background-color', 'green');
        $('#cancelar').prop('disabled', false);
        $('#Password').attr('placeholder', 'Ingrese una Contraseña');
        $('#EdoCta').prop('checked', true);

        $('#eliminar').prop('disabled', true);
        $('#modificar').prop('disabled', true);
        
    } else if ($('#nuevo').text() == 'Grabar') {

        var data = getData();

        $.ajax({

            type: 'POST', 
            url: 'controllers/usuarios.controller.php',
            data: {
                action:'validateUsername', 
                Username: data.Login, 
                Password: data.Password
            }
    
        }).done(function(res) {

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

            } else if (res == 'none'){
                
                if (data) { 
                    data.action = 'addNewUser';
        
                    $.ajax({
        
                        type: 'POST', 
                        url: 'controllers/usuarios.controller.php',
                        data: data
        
                    }).done(function(res) {
                        getDataTable();
                        clearComponents();
                        enableComponents(false);
                    }).fail(function() {
        
                    });
        
                }

            }

        });

    } else if ($('#nuevo').text() == 'Guardar') {

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

                $.ajax({

                    type: 'POST', 
                    url: 'controllers/usuarios.controller.php',
                    data: {
                        action:'validateUsername', 
                        e: $('.seleccionada').attr('id'),
                        Username: data.Login, 
                        Password: data.Password
                    }
    
                }).done(function(res) {

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

                    } else if (res == 'none'){
                
                        if (data) {
                            data.action = 'edit';
                            data.CvUser = $('.seleccionada').attr('id');
        
                            $.ajax({
                                
                                type: 'POST',
                                url: 'controllers/usuarios.controller.php',
                                data: data
                
                            }).done(function(result) {
                                cancelar();
                                getDataTable();
                                $('#Password').attr('placeholder', 'Ingrese una Contraseña');
                            }).fail(function() {
                                alert('ERROR');
                            });
                            
                        }

                    }

                });
                
                
            } else {
                cancelar();
            }
                
        });

    }

}

function getData() {

    const NameUser  = $( '#nameUser' ).val();

    const Login     = $( '#Login'    ).val();
    const Password  = $( '#Password' ).val();
    const FecIni    = $( '#FecIni'   ).val();
    const FecFin    = $( '#FecFin'   ).val();
    const EdoCta    = $( '#EdoCta'   ).is(':checked');

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

    let errors = [];
    
    if (data.NameUser == 0) {
        errors.push('NombreUsuarioError');
    }

    if (data.Login == '') {
        errors.push('LoginUsuarioError');
    }

    if (data.Password == '' && $('#nuevo').text() == 'Grabar') {
        errors.push('PasswordUsuarioError');
    } 

    if (errors.length == 0) {
        clearErrors();
        $('.componentes').removeClass('errors');

        return data;
    } else {
        errors_msg(errors);
        return 0;
    }

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
                data: {action: 'delete', id: filaSeleccionada}
        
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
    $('#nuevo').text('Guardar').css('background-color','green');
    enableComponents(true);
    $('#modificar').prop('disabled', true);
    $('#eliminar').prop('disabled', true);
}
/** ----------------- End Logic Modificar ------------------  */


/** ----------------- Logic Cancelar ------------------  */
function cancelar() {
    clearComponents();
    enableComponents(false);

    $('#cancelar').prop('disabled', true);
    $('#nuevo').text('Nuevo').css('background-color', '#3c8dbc');
    $('.filasTablita').removeClass('seleccionada');
    $('#Password').attr('placeholder', 'Ingrese una Contraseña');
}
/** --------------- End Logic Cancelar ----------------  */


/** --------------- Clear Components ----------------  */
function clearComponents() {
    $('.default').prop('selected', true);
    $('input').val('');
    $('#EdoCta').prop('checked', false);

    clearErrors();
    $('.v-er').removeClass('errors');
    $('#nuevo').text('Nuevo').css('background-color', '#3c8dbc');
}
/** ------------- End Clear Components --------------  */



/** ------------- Enable & Disable Componets --------------  */
function enableComponents(value) {
    $('input').prop('disabled', !value);
    $('select').prop('disabled', !value);
    $('button').prop('disabled', !value);

    $('#nuevo').prop('disabled', false);
    $('#salir').prop('disabled', false);
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
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });
    document.getElementById('FecIni').value = new Date().toDateInputValue();

    $('#FecFin').val(sumaFecha(5, $('#FecIni').val()));
}
function sumaFecha(d, fecha) {

    var Fecha = new Date();
    var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
    var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
    var aFecha = sFecha.split(sep);
    var fecha = aFecha[0]+'/'+aFecha[1]+'/'+aFecha[2];
    fecha= new Date(fecha);
    fecha.setDate(fecha.getDate()+parseInt(d));
    var anno=fecha.getFullYear();
    var mes= fecha.getMonth()+1;
    var dia= fecha.getDate();
    mes = (mes < 10) ? ("0" + mes) : mes;
    dia = (dia < 10) ? ("0" + dia) : dia;
    var fechaFinal = anno+sep+mes+sep+dia;

    return fechaFinal;
}
/** --------------- End Logic Set Date Today ----------------  */



/** --------------- Get Data (Table) ----------------  */
function getDataTable() {

    $.ajax({

        type: 'POST',
        url: 'controllers/usuarios.controller.php',
        data: {action: 'getUsers'}

    }).done(function (result) {
        $('#UsersTable').html(result);
    }).fail(function () {
        alert('ERROR');
    });

}
/** ------------- End Get Data (Table) --------------  */



/** ------------- Select Row in table Users --------------  */
function selectRow(id_fila) {

    if (id_fila == 1) {
        cancelar();
    } else {
        clearErrors();
        showData(id_fila);

        $('.filasTablita').removeClass('seleccionada');
        $('#' + id_fila).addClass('seleccionada');
        
        $('#nuevo').text('Nuevo').css('background-color', '#3c8dbc');

        enableComponents(false);
        
        $('#eliminar').prop('disabled', false);
        $('#modificar').prop('disabled', false);
        $('#cancelar').prop('disabled', false);

        $('#Password').attr('placeholder', 'Ingrese la nueva contraseña').val('');
    }

}
/** ------------- End Select Row in table Users --------------  */
/** ------------- Show Data in Components (Inputs, Selects) --------------  */
function showData(id_fila) {

    $.ajax({

        type: 'POST',
        url: 'controllers/usuarios.controller.php',
        data: {action: 'getDataUser', id: id_fila}

    }).done(function (result) {
        setData(JSON.parse(result));
    }).fail(function () {
        alert('ERROR');
    });
    
}
function setData(data) {
    $( '#nameUser' ).val( data.CvPerson );
    $( '#Login'    ).val( data.Login    );
    // $( '#Password' ).val( data.Password );
    $( '#FecIni'   ).val( data.FecIni   );
    $( '#FecFin'   ).val( data.FecFin   );

    if (data.EdoCta == 1) {
        $('#EdoCta').prop('checked', true);
    } else {
        $('#EdoCta').prop('checked', false);
    }
    
    let now = new Date();
    now.setHours(0,0,0,0);
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
    FecFini.setHours(0,0,0,0);
    FecFini.setDate(FecFini.getDate() + 1);

    let yearr = FecFini.getFullYear();
    let monthh= FecFini.getMonth() + 1;
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