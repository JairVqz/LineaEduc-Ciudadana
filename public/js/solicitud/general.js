src = "https://code.jquery.com/jquery-3.6.0.min.js";
src = "https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js";
src = "https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js";
src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js";
src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js";

document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const nombre = localStorage.getItem('nombreSEV');
    const user = localStorage.getItem('userSEV');
    const body = document.body;

    // NAVBAR
    sidebarToggle.addEventListener('click', function () {
        body.classList.toggle('collapsed');
    });

    var btnPerfil = document.getElementById('btnPerfil');
    btnPerfil.innerHTML = '| <i class="fas fa-user me-2 ms-2 mb-0 pb-0"></i> ' + nombre;

    document.getElementById("correoUsuario").textContent = user;
    document.getElementById("saludoModal").textContent = "¡Hola " + nombre + " !"

    var btnLogout = document.getElementById("btnLogout");

    btnLogout.addEventListener('click', function () {
        localStorage.clear();
        window.location = "/";
        // Reemplazar el estado de la página para evitar que el usuario pueda regresar
        history.replaceState(null, '', '/');

        // Agregar una nueva entrada al historial para asegurarnos de que el usuario no pueda regresar
        history.pushState(null, '', '/');
    });

    const modalPerfil = document.getElementById("modalPerfil");
    const closeModalBtn = document.querySelector(".custom-modal-close");

    // Abre el modal
    btnPerfil.addEventListener("click", () => {
        modalPerfil.style.display = "flex";
    });

    // Cierra el modal al hacer clic en la "X"
    closeModalBtn.addEventListener("click", () => {
        modalPerfil.style.display = "none";
    });

    // Cierra el modal si se hace clic fuera del contenido
    window.addEventListener("click", (event) => {
        if (event.target === modalPerfil) {
            modalPerfil.style.display = "none";
        }
    });

});
