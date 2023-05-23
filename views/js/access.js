// Variables declaration
const SEARCH_BUTTON = $('#buscar');
const CANCEL_BUTTON = $('#cancelar');
const SAVE_BUTTON = $('#guardar');

const LEFT_ARROW = $('#left');
const DB_LEFT_ARROW = $('#db-left');
const RIGHT_ARROW = $('#right');
const DB_RIGHT_ARROW = $('#db-right');

const LEFT_ARROW_2 = $('#left2');
const DB_LEFT_ARROW_2 = $('#dbleft2');
const RIGHT_ARROW_2 = $('#right2');
const DB_RIGHT_ARROW_2 = $('#dbright2');

let array_access_success = [];
let array_access_deleted = [];
// End of variables declaration

SEARCH_BUTTON.click(search);
SAVE_BUTTON.click(saveAccess);
CANCEL_BUTTON.click(cancelar);

LEFT_ARROW.click(addUserSelected);
DB_LEFT_ARROW.click(addAllUserSelected);
RIGHT_ARROW.click(removeUserSelected);
DB_RIGHT_ARROW.click(removeAllUserSelected);

LEFT_ARROW_2.click(addAccess);
DB_LEFT_ARROW_2.click(addAllAccess);
RIGHT_ARROW_2.click(removeAccess);
DB_RIGHT_ARROW_2.click(removeAllAccess);

const ul_users = document.getElementById('ul_users');
const ul_users_selected = document.getElementById('ul_users_selected');

const ul_access = document.querySelector('.list-access');
const ul_access_selected = document.querySelector('.list-access-selected');


function addUserSelected() {
    const node = $('#ul_users .seleccionada')[0];
    ul_users_selected.appendChild(node);
    SEARCH_BUTTON.prop('disabled', false);

    $("#ul_users_selected li").attr('onclick', 'seleccionar2(this.id)')
}

function addAllUserSelected() {
    while (ul_users.firstChild) {
        ul_users_selected.appendChild(ul_users.firstChild);
    }
}
function removeAllUserSelected() {
    while (ul_users_selected.firstChild) {
        ul_users.appendChild(ul_users_selected.firstChild);
    }
}

function removeUserSelected() {
    const node = $('#ul_users_selected .seleccionada')[0];
    ul_users.appendChild(node);
    SEARCH_BUTTON.prop('disabled', true);
}

function seleccionar(id) {
    $('.usuarioSeleccionado').removeClass('seleccionada');
    $('#' + id).addClass('seleccionada');

    CANCEL_BUTTON.prop('disabled', false);
    diableButtons();
}

function seleccionar2(id) {
    $('#ul_users_selected li').removeClass('seleccionada');
    $('#ul_users li').removeClass('seleccionada');
    $('#ul_users_selected #' + id).addClass('seleccionada');

    enableButtons();
}

function seleccionar3(id) {
    $('.list-access li').removeClass('seleccionada');
    $('.list-access-selected li').removeClass('seleccionada');
    $('.list-access #' + id).addClass('seleccionada');
}

function seleccionar4(id) {
    $('.list-access li').removeClass('seleccionada');
    $('.list-access-selected li').removeClass('seleccionada');
    $(".list-access-selected #" + id).addClass('seleccionada');
}

function cancelar() {
    window.location.reload();
}

function addAccess() {
    const node = $('.list-access .seleccionada')[0];
    const text = $('.list-access .seleccionada')[0].textContent;
    const id = $(node).attr('id');

    const isModule = id.substring(4, 8);

    if (isModule != '0000') {
        const id_parent = id.substring(0, 4);

        if (!(array_access_success.includes(id_parent + '0000'))) {

            array_access_success.push(id_parent + '0000');

            const textParent = $('#' + id_parent + '0000')[0].textContent;

            const li_parent = document.createElement('li');
            const span_parent = document.createElement('span');

            li_parent.id = id_parent + '0000';
            span_parent.textContent = textParent;

            li_parent.appendChild(span_parent);

            ul_access_selected.appendChild(li_parent);
        }
    }

    if (!(array_access_success.includes(id))) {
        array_access_success.push(id);

        const li = document.createElement('li');
        const span = document.createElement('span');

        li.id = id;
        span.textContent = text;


        li.appendChild(span);
        ul_access_selected.appendChild(li);
    }

    $(".list-access-selected li").attr('onclick', 'seleccionar4(this.id)')

}

function addAllAccess() {
    $.ajax({
        type: 'POST',
        url: 'controllers/access.controller.php',
        async: false,
        data: {
            action: 'getAllApplications'
        }
    }).done(function (data) {
        array_access_success = data.split(",");
        array_access_success.pop();
        array_access_deleted = [];
    }).fail(function () {
        alert('Error');
    });

    $('.list-access-selected').html('');

    for (let i = 0; i < array_access_success.length; i++) {
        let cv = array_access_success[i];
        let isModule_ = cv.substring(4,8) === '0000';

        $.ajax({
            type: 'POST',
            url: 'controllers/access.controller.php',
            async: false,
            data: {
                action: 'getNameApp',
                cv_app: cv
            }
        }).done(function (data) {

            let li = document.createElement('li');
            li.textContent = data;
            li.id = cv;
            if (isModule_) {
                li.classList.add('negritas-titulo');
            }
            li.onclick = () => seleccionar4(cv);

            ul_access_selected.appendChild(li);

        }).fail(function () {
            alert('Error');
        });

    }
}

function saveAccess() {
    $.ajax({
        type: 'POST',
        url: 'controllers/access.controller.php',
        async: false,
        data: {
            action: 'saveAccess',
            id_user: $('.usuarioSeleccionado.seleccionada').attr('id'),
            success_: array_access_success,
            deleted_: array_access_deleted
        }
    }).done(function (data) {

        swal({
            type: "info",
            title: 'Guardado',
            text: 'Se guardo correctamente',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            timer: 500
        });

    }).fail(function () {
        alert('Error');
    });

    SEARCH_BUTTON.click();
}

function removeAccess() {
    const li = $(".list-access-selected .seleccionada");

    const cv_app = $(li).attr('id');

    if (deleteParent(cv_app) > 1 && cv_app.substring(4, 8) !== '0000') {
        if (!(array_access_deleted.includes(cv_app))) {
            array_access_deleted.push(cv_app)
        }

        array_access_success = array_access_success.filter(item => item !== cv_app);
        li.remove();


        console.log('Entro en el true porque es un submodulo');
        return;
    } else {

        if (deleteParent(cv_app) === 1) {

            if (!(array_access_deleted.includes(cv_app))) {
                array_access_deleted.push(cv_app)
            }

            array_access_success = array_access_success.filter(item => item !== cv_app);
            li.remove();

            console.log('Entro en el false porque es el modulo principal');
        }


    }


}

function removeAllAccess() {
    $.ajax({
        type: 'POST',
        url: 'controllers/access.controller.php',
        async: false,
        data: {
            action: 'searchAccess',
            id_user: $('.usuarioSeleccionado.seleccionada').attr('id')
        }
    }).done(function (data) {
        array_access_deleted = data.split(",");
        array_access_deleted.pop();
        array_access_success = [];
    }).fail(function () {
        alert('Error');
    });

    $('.list-access-selected').html('');
}

function search() {
    const id = $('.seleccionada').attr('id');
    $('#access-selected button').prop('disabled', false);
    SAVE_BUTTON.prop('disabled', false);
    $('.list-access-selected').html('');

    $.ajax({
        type: 'POST',
        url: 'controllers/access.controller.php',
        async: false,
        data: {
            action: 'searchAccess',
            id_user: $('.usuarioSeleccionado.seleccionada').attr('id')
        }
    }).done(function (data) {
        const array = data.split(",");
        array.pop();
        array_access_success = array;
    }).fail(function () {
        alert('Error');
    });

    for (let i = 0; i < array_access_success.length; i++) {
        let cv = array_access_success[i];
        let isModule_ = cv.substring(4,8) === '0000';

        $.ajax({
            type: 'POST',
            url: 'controllers/access.controller.php',
            async: false,
            data: {
                action: 'getNameApp',
                cv_app: cv
            }
        }).done(function (data) {

            let li = document.createElement('li');
            li.textContent = data;
            li.id = cv;
            if (isModule_) {
                li.classList.add('negritas-titulo');
            }
            li.onclick = () => seleccionar4(cv);

            ul_access_selected.appendChild(li);

        }).fail(function () {
            alert('Error');
        });

    }

}

function diableButtons() {
    SEARCH_BUTTON.prop('disabled', true);
    SAVE_BUTTON.prop('disabled', true);
    CANCEL_BUTTON.prop('disabled', true);
    $('.list-access-selected').html('');
    $('#access-selected button').prop('disabled', true);
    $('.list-access li').removeClass('seleccionada');
    $('.list-access-selected li').removeClass('seleccionada');
}

function enableButtons() {
    SEARCH_BUTTON.prop('disabled', false);
    SAVE_BUTTON.prop('disabled', true);
    CANCEL_BUTTON.prop('disabled', true);
    $('.list-access-selected').html('');
    $('#access-selected button').prop('disabled', true);
    $('.list-access li').removeClass('seleccionada');
    $('.list-access-selected li').removeClass('seleccionada');
}


function deleteParent(cv_app) {
    const searchString = cv_app.substring(0, 4);

    const count = array_access_success.reduce((acc, curr) => {
        if (curr.startsWith(searchString)) {
            return acc + 1;
        } else {
            return acc;
        }
    }, 0);

    return count;
}