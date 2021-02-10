(function () {
    "use strict";

    // Localizamos a los actores implicados.
    var cookieAlert = document.querySelector(".cookiealert"); // El contenedor de la alerta
    var acceptCookies = document.querySelector(".acceptcookies"); // Botón para aceptar el comportamiento
    var rejectCookie = document.querySelector("#rejectcookie"); // Botón para rechazar el comportamiento

    // Si no se encuentra el contenedor, directamente terminamos
    if (!cookieAlert) {
       return;
    }

    // Buscamos la cookie "cookieAccepted", si no está en el cliente decidimos mostrar el contenedor de la alerta
    if (!getCookie("cookieAccepted")) {
        cookieAlert.classList.add("show");
    }
    // Si se encuentra la cookie en el cliente y además su valor es "true" decidimos pasar directamente a la página de login
    else if (getCookie("cookieAccepted") == "true") {
        //location.href = "login.html";
    }

    // Evento al botón de "aceptar el comportamiento". Cuando se pulse se crea una cookie con una validez de 365 días y valor "true"
    // Además, ya que el usuario ha decidido que siempre quiere ir directamente a la página de "login", le redirijimos
    acceptCookies.addEventListener("click", function () {
        setCookie("cookieAccepted", true, 365);
        cookieAlert.classList.remove("show");
        //location.href = "login.html";
    });

    // Evento al botón de "rechazar el comportamiento". Guardamos la cookie con validez de 365 días y valor "false"
    rejectCookie.addEventListener("click", function () {        
        cookieAlert.classList.remove("show");
    });

    // Funciones set y get para establecer y obtener cookies del sistema, extraídas de W3Schools
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
})();