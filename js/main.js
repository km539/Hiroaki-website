const form = document.getElementById('form');
const fullName = document.getElementById('name');
const mail = document.getElementById('email');
const message = document.getElementById('message');

//client side validation

const setError = element => {
    const inputControl = element.parentElement;

    inputControl.classList.add('input-error');
    inputControl.classList.remove('input-success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;

    inputControl.classList.add('input-success');
    inputControl.classList.remove('input-error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
function validateInputs(){
    const fullNameValue = fullName.value.trim();
    const emailValue = mail.value.trim();
    const messageValue = message.value.trim();

    if(fullNameValue === '') {
        setError(fullName);
        return false;
    } else {
        setSuccess(fullName);
    }

    if(emailValue === '') {
        setError(mail);
        return false;
    } else if (!isValidEmail(emailValue)) {
        setError(mail);
        return false;
    } else {
        setSuccess(mail);
    }

    if(messageValue === '' || messageValue <= 0) {
        setError(message);
        return false;
        
    } else {
        setSuccess(message);
    }
}