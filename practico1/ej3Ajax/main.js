"use strict"
document.addEventListener("DOMContentLoaded", initPage);

function initPage() {
    let formulario = document.querySelector("#formPersona");
    let respuesta = document.querySelector("#resultado");

    formulario.addEventListener("submit", mostrarResultado);

    async function mostrarResultado(event) {
        event.preventDefault();
        const data = new URLSearchParams(new FormData(this));

        let resp = await fetch(this.action, {
            method: this.method,
            body: data
        });

        let html = await resp.text();
        respuesta.innerHTML = html;
    }

}