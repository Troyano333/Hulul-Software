
    // Obtener los parámetros de la URL
    const params = new URLSearchParams(window.location.search);

    // Extraer valores
    const nombre = params.get("nombre");
    const fecha = params.get("fecha");
    const hora = params.get("hora");
    const lugar = params.get("lugar");
    const palco = params.get("palco");

    // Insertarlos en el DOM
    document.querySelector("#nombre").textContent = nombre;
    document.querySelector("#fecha").textContent = fecha;
    document.querySelector("#hora").textContent = hora;
    document.querySelector("#lugar").textContent = lugar;
    document.querySelector("#palco").textContent = palco;

