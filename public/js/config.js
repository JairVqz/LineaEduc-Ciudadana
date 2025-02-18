window.sev = {

    msal:{
      //Objeto de configuración
      auth:{
        // Datos requeridos para el manejo de la sesión
        // Identificador de la app en azure.
        clientId    : '33ab617d-dcf8-4a8c-bda7-1d2eee65e2dc',
        // Ruta registrada de redireccionamiento de la app.
        redirectUri : 'https://callcenter.sev.gob.mx/index.php'
        //redirectUri : 'http://localhost/callcenter'
      },
      onAuthSuccess: (user)=>{
        // Se ejecuta cuando el usuario es válido
        console.log('Acceso completado');
        //console.log(user);
        localStorage.setItem('token', user.TokenData);
        localStorage.setItem('userSEV', user.Usuario);
        localStorage.setItem('nombreSEV', user.Nombre);
        localStorage.setItem('ubicacionSEV', user.Tipo);
        localStorage.setItem('curpSEV', user.CURP);
        localStorage.setItem('fkUbicacion', 1);

        const ruta = "/index.php/preloadIndex";
        let userSEV = localStorage.getItem('userSEV');
        if (userSEV != null) {
            if (userSEV.includes('@msev.gob.mx')) {
                console.log("Redirigiendo a: " + ruta);
                window.location = ruta;
            } else {
                localStorage.removeItem('token');
                window.location = "/";
            }
        }

      },
      onAuthError: (error)=>{
        // Se ejecuta cuando hay algun tipo de error y no puede continuar
        // Es probable que si se genere una sesión con micrososft
        console.log('Usuario no válido');
        console.log(error);
        localStorage.removeItem('token');
        window.location = "/";
      },
      onLogout: ()=>{
        // Se ejecuta previo a cerrar la sesión del usuario con Microsoft
        console.log('saliendo');
        localStorage.removeItem('token');
        window.location = "/";
      }
    }
  }
