
// llamando id del html
const header = document.getElementById("header");
const menu = document.getElementById("menu-line");
const sidebar = document.getElementById("sidebar");
const settings = document.getElementById("settings")
const settingsContainer = document.getElementById("settings-container");
const body = document.querySelector("body");
const bodyContainer = document.getElementById("body-container");
const angle = document.getElementById("angle");
const containerGeneral = document.getElementById("container-general");
const titleGeneral = document.getElementById("title-general");
const bodyContainerCheck = document.querySelector(".body-container.activo.check");

// funcionamiento del menu
menu.addEventListener("click", () => {
    sidebar.classList.toggle("activo");
    header.classList.toggle("activo");
    body.classList.toggle("activo");
    bodyContainer.classList.toggle("activo");
   
});

// funcionamiento de los ajustes
settings.addEventListener("click", () => {
    settingsContainer.classList.toggle("activo");
});

// funcionamiento del angle de contenido de general de la barra lateral
titleGeneral.addEventListener("click", () => {
    containerGeneral.classList.toggle("activo");
    titleGeneral.classList.toggle("activo");
    angle.classList.toggle("activo");
});




// Función genérica para cargar dinámicamente una sección
function cargarSeccion(seccion, url) {
$('#body-container').hide(); // Oculta el contenido del body-container

// Oculta todas las secciones excepto la que se va a cargar
$('#contenido-reporte, #contenido-asistencia, #contenido-ayuda, #contenido-justificacion, #contenido-verJustificacion').not(seccion).hide();

// Muestra la sección especificada
$(seccion).show();

// Utiliza AJAX para cargar dinámicamente el contenido de la sección
$.ajax({
    url: url,
    method: 'GET',
    success: function (data) {
       
        // Coloca el contenido en el contenedor de la sección
        $(seccion).html(data);
    },
    error: function () {
        alert('Error al cargar la página de ' + seccion);
    }
});
}
 
// Ejemplo de uso para cargar la sección de reporte
function cargarReporte() {
    cargarSeccion('#contenido-reporte', "/reporte");
}



// Ejemplo de uso para cargar la sección de asistencia
function cargarAsistencia() {
    cargarSeccion('#contenido-asistencia', "/asistencia");
}

// Ejemplo de uso para cargar la sección de redactar justificación
function cargarJustificacion() {
   
    cargarSeccion('#contenido-justificacion', "/justificacion");
}

// Ejemplo de uso para cargar la sección de ver justificación
function cargarVerJustificacion() {
    cargarSeccion('#contenido-verJustificacion', "/verJustificacion");
}

// Ejemplo de uso para cargar la sección de ayuda
function cargarAyuda() {
    cargarSeccion('#contenido-ayuda', "/ayuda");
}




