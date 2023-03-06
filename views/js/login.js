// Variables declaration
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const table = document.querySelector('#table');
const form = document.querySelector('#login_form');
// End of variables declaration

// Event listener
form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Create XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up request
    xhr.open('POST', '../controllers/login.controller.php');

    // Set content type header
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Set up response handler
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);

                if (!response) {
                    const error = document.querySelector('div.error-message');
                    if (error) { error.remove() }

                    const message_error = document.createElement('div');
                    message_error.textContent = 'El correo o contraseña es incorrecta';
                    message_error.classList.add('alert', 'alert-danger', 'error-message');
                    password.parentNode.insertAdjacentElement('afterend', message_error);
                } else {
                    window.location = 'main';
                }

            } else {
                console.log('Error: ' + xhr.status);
            }
        }
    };

    // Create data object to send
    var data = {
        table: table.value,
        email: email.value,
        password: password.value
    };

    // Convert data object to JSON format
    var jsonData = JSON.stringify(data);

    // Send request
    xhr.send(jsonData);
});