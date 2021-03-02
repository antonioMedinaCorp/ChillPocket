<div class="alert text-center bg-dark cookieMonth cookies" role="alert" id="cookies"><span class="btn cruzCookies" onclick="cerrarcookies('cookies')">x</span>
<br>Hay nuevo contenido en nuestra página. ¡Échale un vistazo!<br>

            <button type="button" class="btn btn-primary btn-sm acceptcookieMonth mt-3" aria-label="Close">
                Aceptar
            </button>
            
</div>

        <script src="../js/cookieMonth.js"></script>

        <script>
            var cerrarcookies = cookies => {
  document.getElementById(cookies).style.display = "none";
 

}
        </script>