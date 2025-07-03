<head>
<link rel="icon" href="{{ asset(path: 'images/LEC.png') }}">

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">
<script src="/js/config.js"></script>
<script type="module" src="/js/msal-button.js"></script>

<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    section {
        background-image: url('/images/textura-gris.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: calc(100vh - 80px); 
        display: flex;
        align-items: center;
        justify-content: center;
    }
    section.background-image{
        filter: contrast(3);
    }
    .bg-footer {
        background-color: #7A1737;
        color: white;
        height: 80px; 
        position: relative; 
        bottom: 0;
        width: 100%;
    }
    img {
        max-width: 100%;
        height: auto;
        object-fit: contain; 
    }
</style>
<section>
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <!-- Imagen del lado izquierdo -->
            <div class="col-12 col-md-6 text-center">
                <img src="/images/LEC.png" class="img-fluid" alt="Línea Educación Ciudadana">
            </div>
            <!-- Formulario del lado derecho -->
            <div class="col-12 col-md-6">
                <form>
                    <msal-login-button 
                        bienvenida="Bienvenido al sistema de Línea Educación Ciudadana V1.0" 
                        redireccion="Redirigiendo al inicio">
                    </msal-login-button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="bg-footer d-flex justify-content-between align-items-center px-4">
    <div class="text-white">
        Horario de atención al usuario: Lunes a Viernes de 8:00 hrs a 20:00hrs
    </div>
    <div>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-twitter"></i>
        </a>
    </div>
</footer>
