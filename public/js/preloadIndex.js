document.addEventListener('DOMContentLoaded', function () {
    
    const loginValidationRoute = window.Laravel.loginValidation;
    console.log("ruta: "+loginValidationRoute);

    var myVar;
    myFunction();
    const ruta = "/index.php/solicitud/index";

    function myFunction() {
        myVar = setTimeout(showPage, 3000);
    }

    function showPage() {
        document.getElementById("1").style.display = "none";
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";

        const usuario = localStorage.getItem('userSEV');
        const nombreUsuario = localStorage.getItem('nombreSEV');
        const curpUsuario = localStorage.getItem('curpSEV');

        if (usuario.includes('@msev.gob.mx')) {
            console.log("Redirigiendo a: " + ruta);

            fetch(loginValidationRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        Usuario: usuario,
                        Nombre: nombreUsuario,
                        CURP: curpUsuario
                    })
                })
                .then(response => {
                    return response.json();
                })
                .then(data => {

                    if (data.status === "Autorizado") {
                        document.getElementById("estatusAutenticacion").innerText =
                            "¡Acceso concedido, redirigiendo a la página principal!";
                        setTimeout(() => {
                            window.location = ruta;
                        }, 2000);
                    } else {
                        document.getElementById("estatusAutenticacion").innerText =
                            "¡Acceso denegado, no tienes permisos para acceder al sistema!.";
                        document.getElementById("estatusAutenticacion").style.color = "#7A1737";
                        localStorage.clear();
                        setTimeout(() => {
                            window.location = '/';
                        }, 2000);
                    }

                })
                .catch(error => {
                    console.error('Error al enviar los datos', error);
                });

        } else {
            localStorage.removeItem('token');
            localStorage.clear();
            window.location = "/";
        }
    }

    
});