// Variables declaration
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const submit = document.querySelector('#login');
// End of variables declaration

submit.addEventListener('click', login);


function login(e) {
    e.preventDefault();
    alert('login');
}