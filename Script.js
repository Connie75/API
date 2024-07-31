function validatePassword() {
    const passwordInput = document.getElementById('password');
    const requirements = document.getElementById('password-requirements');
    const password = passwordInput.value;

    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!regex.test(password)) {
        requirements.textContent = "La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número.";
        return false;
    } else {
        requirements.textContent = "";
        return true;
    }
}

function showPasswordHint() {
    const requirements = document.getElementById('password-requirements');
    requirements.textContent = "La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número.";
}

window.onload = function() {
    const passwordInput = document.getElementById('password');
    passwordInput.onfocus = showPasswordHint;
    passwordInput.oninput = validatePassword;
}