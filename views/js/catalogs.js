$(document).ready(function () {
    /** --[EVENTOS]-- */

    /** Mostrar Datos Catalogos */
    $('#nombreCatalogo').on('change', function() {
        if ($(this).val() == 'default') {
            $('#datosCatalog').html('');
            $('#nuevo').prop('disabled', true);
            clear();
        } else {
            getCatalogs();
            enabled_disabled(true, '#3c8dbc', 'Nuevo');
            clear();
            $('#cancelar').prop('disabled', true);
            $('#eliminar').prop('disabled', true);
        }
    });

    /** Guardar Nuevo Dato */
    $('#nuevo').click(function() {
        addDescription($(this)); 
    });
    
    /** Eliminar */
    $('#eliminar').click(function() {
        var id = $('.seleccionada').attr('id');
        var catalogo = $('#nombreCatalogo').val();
        var ColCv = 'Cv' + catalogo.substring(1, catalogo.lenght);

        $.ajax({
            type: 'POST', 
            url: 'controllers/catalogs.controller.php',
            data: {
                action: 'Integridad',
                id: id,
                ColCv: ColCv
            }
        }).done(function(res) {

            if (res == 'true') {

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
                    text: 'Se eliminara a ' + $($('#' + id).children()[1]).text(),
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    
                    if (result.value) {
                        deleteDataCatalog(id, catalogo, ColCv);
                    }
                    
                });

            }
        });


    });

    /** Modificar Dato en la Tabla */
    $('#modificar').click(function() {
        editDescription();
    });

    /** Cancelar */
    $('#cancelar').click(function() {
        clear();
        $(this).prop('disabled', true);
    });

    /** Evento de soltar la tecla en el campo */
    $('#descripcion').keyup(function(e) {
        
        if ($('#nuevo').text() == 'Guardar') {
            if (!($(this).val() == $($('.seleccionada')[0].cells[1]).text())) {
                $('#nuevo').removeAttr('disabled');
            } else {
                $('#nuevo').prop('disabled', true);
            }
        }

    });

    /* --------------------------------------------------------------------------------- */
    /* --------------------------------------------------------------------------------- */

    /** --[FUNCIONES]-- */

    /** Mostrar datos de Cada Catalogo */
    function getCatalogs() {    
        enableComponents();

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

    /** Guardar un nuevo DATO */
    function addDescription(boton) {
        var catalogo = $('#nombreCatalogo').val();
        var descripcion = ($('#descripcion').val()).trim();

        var Cv = 'Cv' + catalogo.substring(1, catalogo.lenght);
        var Ds = 'Ds' + catalogo.substring(1, catalogo.lenght);

        if (boton.text() == 'Grabar') {
            /** Validar que el campo no quede vacio */
            if ($('#descripcion').val() == '') {
                
                swal({
                    type: "error",
                    title: "¡Error!",
                    text: "¡No deje el campo vacio!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }); 

                return false;
            }

            /** Validar que no se repitan datos dentro de un catalogo */
            if (validateRepeat(catalogo, descripcion, [Cv, Ds])) {
                
                swal({
                    type: "error",
                    title: "¡Error!",
                    text: "El dato esta se encuentra repetido",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }); 

                $('#descripcion').focus();
                return false;
            }

            
            /** Agregar Nueva Descripción */
            $.ajax({
                
                type: 'POST', 
                url: 'controllers/catalogs.controller.php',
                data: {
                    action: 'addDescription',
                    catalog: catalogo,
                    description: descripcion,
                    columns: [Cv, Ds]
                }

            }).done(function(data) {
                getCatalogs();
                clear();
                $('#cancelar').prop('disabled', true);
            }).fail(function() {
                alert('Error');
            });

            enabled_disabled(true, '#3c8dbc', 'Nuevo');

        } else if (boton.text() == 'Nuevo') {
            
            enabled_disabled(false, 'green', 'Grabar');

            $('#descripcion').focus().val('');
            $('#cancelar').removeAttr('disabled');
            $('#eliminar').prop('disabled', true);
            $('#modificar').prop('disabled', true);
            $('.filasTablita').removeClass('seleccionada');

        } else if (boton.text() == 'Guardar') {

            var id = $('.seleccionada').attr('id');

            swal({
                type: "warning",
                title: '¿Estas seguro?',
                text: 'Se editara a ' + $($('#' + id).children()[1]).text(),
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                }).then((result) => {
                    
                    if (result.value) {
                        
                        /** Validar que el campo no quede vacio */
                        if ($('#descripcion').val() == '') {
                            
                            swal({
                                type: "error",
                                title: "¡Error!",
                                text: "No deje el campo vacio",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            });

                            return false;
                        }

                        var id = $('.seleccionada').attr('id');
                        var desc_table = $($('#' + id).children()[1]).text();

                        if (!(desc_table.toLowerCase() === descripcion.toLowerCase())) {
                            /** Validar que no se repitan datos dentro de un catalogo */
                            if (validateRepeat(catalogo, descripcion, [Cv, Ds])) {

                                swal({
                                    type: "error",
                                    title: "¡Error!",
                                    text: "El dato esta se encuentra repetido",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then((result) => {
                                    $('#descripcion').focus();
                                });  
                                return false;
                            }
                        }

                        /** Editar una Descripción */
                        var id_description = $('.seleccionada').attr('id');
                        $.ajax({
                            
                            type: 'POST', 
                            async: false,
                            url: 'controllers/catalogs.controller.php',
                            data: {
                                action: 'editDescription',
                                catalog: catalogo,
                                description: descripcion,
                                id_description: id_description,
                                columns: [Cv, Ds]
                            }

                        }).done(function(data) {
                            getCatalogs();
                            clear();
                        }).fail(function() {
                            alert('Error');
                        });
                    }
                });

        }
    }

    /** Eliminar un dato de un catalogo */
    function deleteDataCatalog(id, catalogo, ColCv) {

        $.ajax({
        
            type: 'POST', 
            url: 'controllers/catalogs.controller.php',
            data: {
                action: 'deleteDescription',
                catalog: catalogo,
                id: id,
                ColCv: ColCv
            }

        }).done(function(data) {
            getCatalogs();
            clear();
        }).fail(function() {
            alert('Error');
        });

    }

    /** Modificar Descripción de un catalogo */
    function editDescription() {
        $('#descripcion').prop('disabled', false).focus();
        $('#nuevo').text('Guardar').css('background-color', 'green').prop('disabled', true);
        $('#modificar').prop('disabled', true);
        $('#eliminar').prop('disabled', true);
    }

    /** Habilitar y Desabilitar el campo de "Descripición" */
    function enabled_disabled(value, background, text) {
        $('#descripcion').prop('disabled', value);
        $('#nuevo').css('background-color', background);
        $('#nuevo').text(text);
    }

    /** Limpia el campo de texto */
    function clear() {
        $('#descripcion').val('');
        $('.filasTablita').removeClass('seleccionada');
        enabled_disabled(true, '#3c8dbc', 'Nuevo');
        $('#eliminar').prop('disabled', true);
        $('#modificar').prop('disabled', true);
        $('#cancelar').prop('disabled', true);
    }

    /** Habilita los botones */
    function enableComponents() {
        $('#nuevo').removeAttr('disabled');
        $('#regresar').removeAttr('disabled');
    }

    /** Validar que no se repitan datos dentro de un catalogo */
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
            success: function(data) {
                if (data === 'true') {
                    re = true;
                }
            }

        });

        return re;
    }

    $('#descripcion').bind('keypress', function(event) {
        let catalogo = $('#nombreCatalogo').val();

        if (catalogo == 'cColonia' || catalogo == 'cCalle') {
            var regex = new RegExp("^[a-zA-Z0-9 äÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ\u00f1\u00d1]+$"); 
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        } else {
            var regex = new RegExp("^[a-zA-Z äÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ\u00f1\u00d1]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
    });

});

function seleccionar(id_fila) {

    $('.filasTablita').removeClass('seleccionada');
    $('#' + id_fila).addClass('seleccionada');
    
    $('#descripcion').prop('disabled', true).val('');
    $('#nuevo').text('Nuevo').css('background-color', '#3c8dbc').removeAttr('disabled');

    $('#cancelar').removeAttr('disabled');
    $('#modificar').removeAttr('disabled');
    $('#eliminar').removeAttr('disabled');

    $('#descripcion').val($($('#' + id_fila)[0].cells[1]).text());
}