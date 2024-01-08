// Llamando al elemento HTML con el id "password"
const password = document.getElementById("password");

// Función para alternar entre mostrar y ocultar la contraseña
let showPassword = () => {
    // Verificando el tipo actual de la contraseña
    if (password.type === "password") {
        // Cambiando el tipo a "text" para mostrar la contraseña
        password.type = "text";
    } else {
        // Cambiando el tipo a "password" para ocultar la contraseña
        password.type = "password";
    }
};
