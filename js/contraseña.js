function validarReset() {
    var correo, telefono, contraseña, repetir, expresion;

    correo = document.getElementById("email").value;
    telefono = document.getElementById("phone").value;
    contraseña = document.getElementById("newPassword").value;
    repetir = document.getElementById("confirmPassword").value;
    expresion = /\w+@\w+\.[a-z]+/;

    if (correo === "" || telefono === "" || contraseña === "" || repetir === "") {
        alert("Todos los campos son obligatorios");
        return false;
    } else if (correo.length > 100 || !expresion.test(correo)) {
        alert("El correo no es válido");
        return false;
    } else if (telefono.length > 10 || isNaN(telefono)) {
        alert("El teléfono ingresado no es válido");
        return false;
    } else if (contraseña.length > 30) {
        alert("La contraseña es muy larga");
        return false;
    } else if (repetir.length > 30) {
        alert("La repetición de la contraseña es muy larga");
        return false;
    } else if (contraseña !== repetir) {
        alert("Las contraseñas no coinciden");
        return false;
    }

    return true;
}
