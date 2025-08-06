const video = document.getElementById("videoPlayer");
let indiceActual = 0;
function cargarVideo(indice) {
    if (indice < listaReproduccion.length) {
        video.src = listaReproduccion[indice];
    video.play();


    }
}

video.addEventListener("ended", () => {
    indiceActual++;
    if (indiceActual < listaReproduccion.length) {
        cargarVideo(indiceActual);
    } else {
        console.log("Lista de reproducción terminada.");
    }
});

window.onload = () => {
    if (listaReproduccion.length > 0) {
        cargarVideo(indiceActual);
    } else {
        alert("No se encontraron videos en la carpeta.");
    }
};





