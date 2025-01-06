const form = document.querySelector('form');
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirm_password"]');
const passwordInput = form.querySelector('input[name="password"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

emailInput.addEventListener('keyup', function() {
    setTimeout(function() {
        markValidation(emailInput, isEmail(emailInput.value));
    }, 1000)
})

confirmedPasswordInput.addEventListener('keyup', function() {
    setTimeout(function() {
        const condition = arePasswordsSame(
            passwordInput.value,
            confirmedPasswordInput.value
        )
        markValidation(confirmedPasswordInput, condition);
    }, 1000)
})

form.addEventListener('submit', function(event) {
    const emailValid = isEmail(emailInput.value);
    const passwordsMatch = arePasswordsSame(passwordInput.value, confirmedPasswordInput.value);

    markValidation(emailInput, emailValid);
    markValidation(confirmedPasswordInput, passwordsMatch);

    if (!emailValid || !passwordsMatch) {
        event.preventDefault();
    }
});