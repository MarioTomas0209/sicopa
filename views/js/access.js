// Variables declaration
const SEARCH_BUTTON = $('#buscar');
const CANCEL_BUTTON = $('#cancelar');
const SAVE_BUTTON = $('#guardar');

const LEFT_ARROW = $('#left');
const DB_LEFT_ARROW = $('#db-left');
const RIGHT_ARROW = $('#right');
const DB_RIGHT_ARROW = $('#db-right');

const LEFT_ARROW_2 = $('#left2');
const RIGHT_ARROW_2 = $('#right2');

let array_access_success = [];
// End of variables declaration

SEARCH_BUTTON.click(search);
SAVE_BUTTON.click(saveAccess);
CANCEL_BUTTON.click(cancelar);

LEFT_ARROW.click(addUserSelected);
DB_LEFT_ARROW.click(addAllUserSelected);
RIGHT_ARROW.click(removeUserSelected);
DB_RIGHT_ARROW.click(removeAllUserSelected);

LEFT_ARROW_2.click(addAccess);
RIGHT_ARROW_2.click(removeAccess);

const ul_users = document.getElementById('ul_users');
const ul_users_selected = document.getElementById('ul_users_selected');

const ul_access = document.querySelector('.list-access');
const ul_access_selected = document.querySelector('.list-access-selected');

function addUserSelected() {
    const node = $('#ul_users .seleccionada')[0];
    ul_users_selected.appendChild(node);
    SEARCH_BUTTON.prop('disabled', false);
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
}

function seleccionar2() {
    SEARCH_BUTTON.prop('disabled', false);
}

function seleccionar3(id) {
    $('.list-access li').removeClass('seleccionada');
    $('.list-access #' + id).addClass('seleccionada');
}

function cancelar() {
    $('.usuarioSeleccionado').removeClass('seleccionada');
    NEW_BUTTON.prop('disabled', true);
    CANCEL_BUTTON.prop('disabled', true);
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


}

function saveAccess() {
    $.ajax({
        type: 'POST',
        url: 'controllers/access.controller.php',
        data: {
            action: 'saveAccess',
            id_user: $('.usuarioSeleccionado.seleccionada').attr('id'),
            access: array_access_success
        }
    }).done(function (data) {

        console.log(data);

    }).fail(function () {
        alert('Error');
    });
}

function removeAccess() {

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

            ul_access_selected.appendChild(li);

        }).fail(function () {
            alert('Error');
        });
        
    }

}