// Variables declaration
const correo = document.querySelector('#correo');
const password = document.querySelector('#password');
const login = document.querySelector('#login');
// End of variables declaration

login.addEventListener('click', login);


function login(e) {
    e.preventDefault();
    alert('login');
}