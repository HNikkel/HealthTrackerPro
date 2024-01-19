const form = document.getElementById('form');
const stu_id = document.getElementById('stu_id');
const password = document.getElementById('password');

form.addEventListener('submit', e => {


    const stu_idValue = stu_id.value.trim();
    const passwordValue = password.value.trim();


    if (stu_idValue === '') {
        setError(stu_id, 'Student ID is required');
        e.preventDefault();
    } else if (stu_idValue.length < 9) {
        setError(stu_id, 'Invalid Student ID.')
        e.preventDefault();
    } else {
        setSuccess(stu_id);
    }


    if (passwordValue === '') {
        setError(password, 'Password is required');
        e.preventDefault();
    } else if (passwordValue.length < 7) {
        setError(password, 'Please enter a valid password.')
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



