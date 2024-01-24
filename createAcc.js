const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', e => {


    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();



    if (usernameValue === '') {
        setError(username, 'Username is required');
        e.preventDefault();
    } else {
        setSuccess(username);

    }

    if (passwordValue === '') {
        setError(password, 'Password is required');
        e.preventDefault();
    } else if (passwordValue.length < 7) {
        setError(password, 'Password must be at least 7 characters.')
        e.preventDefault();
    } else {
        setSuccess(password);
    }

});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};



