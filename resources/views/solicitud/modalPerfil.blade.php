<style>
    .custom-modal {
    display: none;
    position: fixed;
    top: 0px;
    right: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0);
    justify-content: end;
    align-items: start;
    z-index: 1050;
}

.custom-modal-content {
    top: 67px;
    background-color: white;
    padding: 20px;
    border-radius: 12px;
    width: 300px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0);
    position: relative;
}

.custom-modal-close {
    position: absolute;
    top: 6px;
    right: 10px;
    font-size: 30px;
    cursor: pointer;
}

.custom-modal-close:hover {
    color: red;
}

.user-icon {
        font-size: 5rem;
        color: #7A1737
    }
</style>

<div id="modalPerfil" class="modal-container custom-modal">
    <div class="modal-content custom-modal-content border">
        <div class="d-flex align-items-center">
            <p class="flex-grow-1 text-center m-0" id="correoUsuario" style="font-weight: bold"></p>
            <span class="close-modal custom-modal-close">&times;</span>
        </div>
        <div class="text-center p-2">
            <i class="bi bi-person-circle user-icon"></i>
            <p id="saludoModal"></p>
        </div>
        <div class="d-flex justify-content-center p-1">
            <a href="{{ route('auth.logout') }}" class="btn btn-color text-center" id="btnLogout">Cerrar Sesión</a>
        </div>
    </div>
</div>
