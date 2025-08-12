    function toggleVideo(videoSrc, thumbElement) {
        const container = thumbElement.nextElementSibling;

        if (container.innerHTML.trim() === "") {
            // Inserta el video
            container.innerHTML = `<video controls autoplay>           
                <source src="${videoSrc}" type="video/mp4">
                Tu navegador no soporta video HTML5.
		</video>`;

            // Espera a que el DOM actualice y luego activa pantalla completa
            setTimeout(() => {
                const video = container.querySelector("video");
                if (video.requestFullscreen) {
                    video.requestFullscreen();
                } else if (video.webkitRequestFullscreen) { // Safari
                    video.webkitRequestFullscreen();
                } else if (video.msRequestFullscreen) { // IE11
                    video.msRequestFullscreen();
                }
		                // Detecta salida del modo pantalla completa
            const salirPantallaCompleta = () => {
                if (
                    !document.fullscreenElement &&
                    !document.webkitFullscreenElement &&
                    !document.msFullscreenElement
                ) {
                    // El usuario salió de pantalla completa: vaciamos el contenedor
                    container.innerHTML = "";
                    // Quitamos el listener para evitar acumulación
                    document.removeEventListener("fullscreenchange", salirPantallaCompleta);
                    document.removeEventListener("webkitfullscreenchange", salirPantallaCompleta);
                    document.removeEventListener("msfullscreenchange", salirPantallaCompleta);
                }
            };

            // Escuchamos los distintos prefijos de eventos
            document.addEventListener("fullscreenchange", salirPantallaCompleta);
            document.addEventListener("webkitfullscreenchange", salirPantallaCompleta);
            document.addEventListener("msfullscreenchange", salirPantallaCompleta);

        }, 100);


        } else {
            container.innerHTML = ""; // Oculta el video si ya está abierto
        }
    }
