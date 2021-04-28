"use strict"

document.addEventListener("DOMContentLoaded", initPage);

function initPage() {
    let links = document.querySelectorAll("a");
    let imprimir = document.querySelector("#respuesta");

    links.forEach(a => a.addEventListener("click", function(e) {
        e.preventDefault();
        imprimirRespuesta(a);
    }));

    async function imprimirRespuesta(link) {
        let respuesta = await fetch(link.href);
        let html = await respuesta.text();
        imprimir.innerHTML = html;
    }
}