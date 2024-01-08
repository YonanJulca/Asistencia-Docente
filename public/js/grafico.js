(function () {
    // Esta función autoinvocada encapsula el código, ayudando a evitar conflictos de ámbito.

    // Gráfico de pastel
    const pie = document.getElementById("pie").getContext("2d");

    // Crear instancia de Chart para el gráfico de pastel
    let graphicsPie = new Chart(pie, {
        type: 'pie',
        data: {
            // Etiquetas para las porciones del pastel
            labels: ["Ausente", "Tardanza", "Puntual"],
            datasets: [{
                // Datos para cada porción del pastel
                data: obtenerDatosGrafico(),
                // Colores correspondientes a cada etiqueta
                backgroundColor: ["#f00", "#F96A1E", "#1AA220"]
            }]
        }
    });

    // Gráfico de líneas
    const line = document.getElementById("line").getContext("2d");

    // Crear instancia de Chart para el gráfico de líneas
    let graphicsLine = new Chart(line, {
        type: 'line',
        data: {
            // Etiquetas para el eje x (fechas)
            labels: obtenerFechas(),
            datasets: [{
                // Datos de asistencia mensual para el gráfico de líneas
                label: 'Asistencia Mensual',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: obtenerAsistenciasPorMes('Puntual'),
                backgroundColor: '#26D107',
                borderWidth: 1
            },
            {
                // Datos de inasistencia mensual para el gráfico de líneas
                label: 'Inasistencia Mensual',
                borderColor: 'rgba(255, 192, 192, 1)',
                data: obtenerAsistenciasPorMes('Ausente'),
                backgroundColor: '#f00',
                borderWidth: 1
            }]
        },
        options: {
            // Configuración adicional, en este caso, escalas del eje y
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de barras
    const bar = document.getElementById("bar").getContext("2d");

    // Crear instancia de Chart para el gráfico de barras
    let graphicsBar = new Chart(bar, {
        type: "bar",
        data: {
            // Etiquetas para el eje x (fechas)
            labels: obtenerFechas(),
            datasets: [{
                // Datos de justificaciones mensuales para el gráfico de barras
                label: "Justificaciones mensuales",
                borderColor: 'rgba(179, 192, 255, 1)',
                borderWidth: 1,
                backgroundColor: '#187FC1',
                data: obtenerAsistenciasPorMes('Justificacion')
            },
            {
                // Datos de tardanzas mensuales para el gráfico de barras
                label: "Tardanzas mensuales",
                borderColor: 'rgba(179, 192, 185, 1)',
                borderWidth: 1,
                backgroundColor: '#F96A1E',
                data: obtenerAsistenciasPorMes('Tardanza')
            }]
        },
        options: {
            // Configuración adicional, en este caso, escalas del eje y
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 5
                }
            }
        }
    });

    // Funciones de utilidad

    // Obtener datos para el gráfico de pastel
    function obtenerDatosGrafico() {
        if (window.datosAsistencia) {
            // Contar la cantidad de cada estado de asistencia
            const ausente = window.datosAsistencia.filter(asistencia => asistencia.estado === 'Ausente').length;
            const tardanza = window.datosAsistencia.filter(asistencia => asistencia.estado === 'Tardanza').length;
            const puntual = window.datosAsistencia.filter(asistencia => asistencia.estado === 'Puntual').length;

            return [ausente, tardanza, puntual];
        }
        return [];
    }

    // Obtener fechas para el eje x de los gráficos
    function obtenerFechas() {
        return window.datosAsistencia.map(asistencia => asistencia.fecha);
    }

    // Obtener datos de asistencia por mes para los gráficos de líneas y barras
    function obtenerAsistenciasPorMes(estado) {
        return window.datosAsistencia.map(asistencia => (asistencia.estado === estado) ? 1 : 0);
    }

})();
