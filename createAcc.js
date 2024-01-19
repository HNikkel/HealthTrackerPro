const form = document.getElementById('form');
const name = document.getElementById('name');
const stu_id = document.getElementById('stu_id');
const Year = document.getElementById('Year');
const password = document.getElementById('password');

form.addEventListener('submit', e => {


    const nameValue = name.value.trim();
    const stu_idValue = stu_id.value.trim();
    const passwordValue = password.value.trim();
    const yearValue = Year.value.trim();



    if (nameValue === '') {
        setError(name, 'Username is required');
        e.preventDefault();
    } else {
        setSuccess(name);

    }

    if (stu_idValue === '') {
        setError(stu_id, 'Student ID is required');
        e.preventDefault();
    } else if (stu_idValue.length < 9) {
        setError(stu_id, 'StudentID must be at least 9 characters.')
        e.preventDefault();
    } else {
        setSuccess(stu_id);
    }



    if (yearValue === '') {
        setError(Year, 'Year is required');
        e.preventDefault();
    } else {
        setSuccess(Year);
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



