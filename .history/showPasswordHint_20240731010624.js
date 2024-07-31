function showPasswordHint() {
    const requirements = document.getElementById('password-requirements');
    requirements.textContent = "La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número.";
}

window.onload = function() {
    const passwordInput = document.getElementById('password');
    passwordInput.onfocus = showPasswordHint;
    passwordInput.oninput = validatePassword;
}