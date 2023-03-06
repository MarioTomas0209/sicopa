// Variables declaration
const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

const id_card = document.querySelector('#id_card');
const _name = document.querySelector('#name');
const last_name = document.querySelector('#last_name');
const address = document.querySelector('#address');
const phone = document.querySelector('#phone');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const profile = document.querySelector('#profile');

const button_submit = document.querySelector('#button_submit');
const edit_submit = document.querySelector('#edit_submit');
// End of variables declaration

document.addEventListener('DOMContentLoaded', function() {

    // Event Listeners
    id_card.addEventListener('blur', validateForm);
    _name.addEventListener('blur', validateForm);
    last_name.addEventListener('blur', validateForm);
    address.addEventListener('blur', validateForm);
    phone.addEventListener('blur', validateForm);
    email.addEventListener('blur', validateForm);
    password.addEventListener('blur', validateForm);
    button_submit.addEventListener('click', saveData);
    // edit_submit.addEventListener('click', saveData);

    // Properties
    button_submit.disabled = true;
    button_submit.classList.add('cursor-not-allowed', 'opacity-50');
});


function saveData(e) {
    e.preventDefault();
    ajaxPost(getData());
}

function showUser(id) {
    ajaxPost({action: 'getUser', id_user: id});
}

function deleteUser(id) {
    confirm('¿Estas seguro que deseas eliminar?') ? ajaxPost({action: 'deleteUser', id_user: id}) : false;
}

function printDataUser(data_user) {
    const edit_id_card = document.querySelector('#edit_id_card').value = data_user.cedula;
    const edit_name = document.querySelector('#edit_name').value = data_user.nombre;
    const edit_last_name = document.querySelector('#edit_last_name').value = data_user.apellidos;
    const edit_address = document.querySelector('#edit_address').value = data_user.direccion;
    const edit_phone = document.querySelector('#edit_phone').value = data_user.telefono;
    const edit_email = document.querySelector('#edit_email').value = data_user.email;
    const edit_password = document.querySelector('#edit_password').value = data_user.password;
    const edit_profile = document.querySelector('#edit_profile').value = data_user.perfil;
}

function ajaxPost(data) {
    // Create XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up request
    xhr.open('POST', 'controllers/users.controller.php');

    // Set content type header
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Set up response handler
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                if (xhr.responseText) {
                    const response = JSON.parse(xhr.responseText);
                    printDataUser(response);
                } else {
                    window.location.reload();
                }

            } else {
                console.log('Error: ' + xhr.status);
            }
        }
    };

    // Convert data object to JSON format
    var jsonData = JSON.stringify(data);

    // Send request
    xhr.send(jsonData);
}

function getData() {
    return {
        action: 'saveUser',
        id_card: id_card.value,
        name: _name.value,
        last_name: last_name.value,
        address: address.value,
        phone: phone.value,
        email: email.value,
        password: password.value,
        profile: profile.value
    }
}

function validateForm(e) {
    if (e.target.value.length > 0) {
        e.target.classList.remove('border', 'border-danger');
        e.target.classList.add('border', 'border-success');
    } else {
        e.target.classList.remove('border', 'border-success');
        e.target.classList.add('border', 'border-danger');
    }

    if (e.target.type === 'email') {
        if (re.test(e.target.value)) {
            e.target.classList.remove('border', 'border-danger');
            e.target.classList.add('border', 'border-success');
        } else {
            e.target.classList.remove('border', 'border-success');
            e.target.classList.add('border', 'border-danger');
        }
    }

    if (
        id_card.value !== '' && 
        _name.value !== '' &&
        last_name.value !== '' &&
        address.value !== '' &&
        phone.value !== '' &&
        re.test(email.value) &&
        password.value !== ''
    ) {
        button_submit.disabled = false;
        button_submit.classList.remove('cursor-not-allowed', 'opacity-50');
    } else {
        button_submit.disabled = true;
        button_submit.classList.add('cursor-not-allowed', 'opacity-50');
    }
    
}



