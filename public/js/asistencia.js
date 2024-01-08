(function () {
    // Obtener el elemento del DOM para mostrar la hora
    const registerHour = document.getElementById("register-hour");

    // Función para mostrar la hora
    function hour() {
        // Obtener la fecha actual
        let date = new Date();
        let hour = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();

        // Formatear la hora, minutos y segundos para que siempre tengan dos dígitos
        let getHour = (hour < 10) ? "0" + hour : hour;
        let getMinutes = (minutes < 10) ? "0" + minutes : minutes;
        let getSeconds = (seconds < 10) ? "0" + seconds : seconds;

        // Mostrar la hora formateada en el elemento del DOM
        registerHour.innerHTML = `${getHour}:${getMinutes}:${getSeconds}`
    }

    // Actualizar la hora cada segundo utilizando setInterval
    setInterval(hour, 1000);

    // Mostrar la hora inicial al cargar la página
    hour();
})();
