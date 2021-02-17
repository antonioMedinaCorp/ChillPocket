(function () {
    "use strict";

    // Localizamos a los actores implicados.
    var cookieMonth = document.querySelector(".cookieMonth"); // El contenedor de la alerta
    var acceptcookieMonth = document.querySelector(".acceptcookieMonth"); // Botón para aceptar el comportamiento
   

    // Si no se encuentra el contenedor, directamente terminamos
    if (!cookieMonth) {
       return;
    }

    // Buscamos la cookie "cookieMonth", si no está en el cliente decidimos mostrar el contenedor de la alerta
    if (!getCookie("cookieMonth")) {
        cookieMonth.classList.add("show");
    }
    // Si se encuentra la cookie en el cliente y además su valor es "true" decidimos pasar directamente a la página de login
    else if (getCookie("cookieMonth") == "true") {
        //location.href = "login.html";
    }

    // Evento al botón de "aceptar el comportamiento". Cuando se pulse se crea una cookie con una validez de 365 días y valor "true"
    // Además, ya que el usuario ha decidido que siempre quiere ir directamente a la página de "login", le redirijimos
    acceptcookieMonth.addEventListener("click", function () {
        setCookie("cookieMonth", true, 30);
        cookieMonth.classList.remove("show");
        //location.href = "login.html";
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