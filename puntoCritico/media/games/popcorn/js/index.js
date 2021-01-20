var game = (function () {

    // Variables globales relacionadas con los elementos html e imágenes a cargar
    var canvas,
        ctx,
        imgFondo, // Imagen del background del juego
        imgCargadas = 0, // Control de la cantidad de imágenes cargadas
        imgCubo, // Imagen del cubo
        imgPalomita, // Imagen de palomita
        puntuacion = 0,
        finDeJuego = false,
        mover = true;
        
        //Tamaño de las imágenes
       var cuboX = 100,
        cuboY = 100,
        popX = 25,
        popY = 25;

        //Declaramos array de obstaculos
        obst = [];
        var lastRandomValue, exampleArray = [-84,-56,-28,0,28,56,84,112,140,168,196,224,252,280,308,336,364,392,420,448,476,504,532,560,588,616,644,672,700,728,756,784,812,840,868,896,924,952,980,1008,1036,1064,1092,1120];

  

        //Coordenadas iniciales del cubo
        var CoorX = 510;
        var CoorY = 580;

        var tiempoDeJuego = 6000;
        var totalTime = 600;
        var seconds = 60;

        window.onload = init;
      
            window.setInterval(function(){
                    //seconds--;
                    if(seconds == 0){
                        finDeJuego = true;
                    }else{
                        seconds--;
                    }
                },1000);
        
        
          
        
      //  function updateClock(){
            //document.getElementById("countdown").innerHTML=totalTime:
           
      //      if(totalTime == 0){
                //alert('Final');
        //        finDeJuego=true;
          //  }else{
            //    totalTime -=1;
              //   setTimeout("updateClock()",60000);
           // }
            
       // }

   
    /**
     * Función de inicialización del juego. Esta es la función principal, la que se llama desde el código html.
     * Se encarga de inicializar las variables globales necesarias para el juego
     */
    function init() {
        // Lo primero es comenzar a cargar las imágenes
        preloadImages();

        // Obtención del elemento html con id = "canvas". Puedes mirar el código html para entender mejor esto
        canvas = document.getElementById('canvas');
        // Necesitamos el contexto del canvas, para poderlo utilizar como "brocha", gracias a este elemento podremos
        // asignar colores y pintar primitivas, imágenes, textos, etc.
        ctx = canvas.getContext("2d");
       

         // Empezamos el primer frame
         gameLoop();
        

        


    }

    function gameLoop(){
        paintEscena();
        getTransitoryItems();
        getCollisions();
      
       

        window.requestAnimationFrame(gameLoop);
        //console.log(canvas.width);
        //console.log(canvas.height);

        // va a marcar el tiempo del juego
        //setTimeout(function(){ finDeJuego=true; }, tiempoDeJuego);
    }



    //Creamos una clase para los obstaculos
    class Obstaculo{
        constructor(){
            this.x = this.sacarXAleatoria();
            this.y = 0;

            this.vy = 2;
            this.imgSprite = imgPalomita;
        }
    
        sacarXAleatoria(){
            for(var i = 0, len = 1; i < len; i++) {
                return numerosAleatoriosNoRepetidos(exampleArray);
            }
        }
        mover(){
            this.y += this.vy;
        }
        paint(){
          ctx.drawImage(this.imgSprite, this.x, this.y, popX, popY);
        }
    }

    // crea la palomita y la mete en el array si no hemos llegado al FIN DEL JUEGO
    function getTransitoryItems(){
        if(finDeJuego == false){
            if (Math.random() < 0.02) {
                obst.push(new Obstaculo())
            }
        }
        
    }

    // hace las palomitas aparezcan y caigan
    function bucleobs(){
        for(let i = 0; i < obst.length; i++){
            obst[i].mover();
            obst[i].paint();
           //si se van por abajo desaparecen del array
            if(obst[i].y + popY > canvas.height){
                obst.splice(i,1);
                continue;
            }
            // si se acaba el tiempo desaparecen del array
            //if(finDeJuego == true){
              //  obst.splice(i,1);
            //}
        }
    }

    // para comprobar si hay colisiones o en mi caso, para coger palomitas y sumarlas a la puntuación
    function getCollisions() {      
        for (let i = 0; i < obst.length; i++) {
            //if (obst[i].x + popX == CoorX + cuboX && obst[i].y + popY == CoorY + cuboY) {
                if ((obst[i].x >= CoorX && obst[i].x <= CoorX + (cuboX)) && obst[i].y >= CoorY || (obst[i].x + popX >= CoorX && obst[i].x + popX <= CoorX + (cuboX /2) && obst[i].y >= CoorY)) {
                    //alert("Has colisionado: Fin del juego");
                    puntuacion++;
                    obst.splice(i,1);
            }
            
            
        }
    }

    // gernerar números aleatorios para sacar las palomitas
    function numerosAleatoriosNoRepetidos(array) {
        var item = array[Math.floor(Math.random()*array.length)];
        if(lastRandomValue === item && array.length > 1) {
            return numerosAleatoriosNoRepetidos(array, item);
        } 
        return lastRandomValue = item;
     }
     



    /**
     * A través de este método conseguiremos precargar las imágenes. Este proceso en JS no es síncrono, por tanto necesitamos implementar
     * una especie de disparador. Cada vez que una imagen se carge (lo controlaremos por la ejecución de la función "addEventListener")
     * se aumentará en 1 la cantidad de imágenes cargadas y se llamará a la función que pinta la escena.
     */
    function preloadImages() {
        
        // Carga de la imagen del fondo del juego
        imgFondo = new Image();
        imgFondo.src = 'images/fondo1512x1008.jpg';
        imgFondo.addEventListener('load', function() {
            // Este trozo de código se ejecutará de manera asíncrona cuando la imagen se haya realmente cargado.
            imgCargadas++;
            paintEscena();
          }, false);

        imgCubo = new Image();
        imgCubo.src = 'images/cubo.png';
        imgCubo.addEventListener('load', function() {
          imgCargadas++;
            paintEscena();
        }, false);

        document.addEventListener("keydown", function(event){
            var keyPress = event.key;
            if(keyPress == "ArrowRight"){
                //event.keyCode == 39
               // console.log("Has pulsado la derecha" );
                moverDerecha();
                paintEscena();
            }
            if(keyPress == "ArrowLeft"){
                //event.keyCode == 37
             //console.log("Has pulsado la izquierda");
             moverIzquierda();
             paintEscena();
            }
            if(keyPress == "ArrowUp"){
                //event.keyCode == 38
               // console.log("Has pulsado la izquierda");
                moverArriba();
                paintEscena();
               }
               if(keyPress == "ArrowDown"){
                   //event.keyCode == 40
                //console.log("Has pulsado la izquierda");
                moverAbajo();
                paintEscena();
               }   
         });

         // Cargar imágenes de las palomintas
        imgPalomita = new Image();
        imgPalomita.src = 'images/palomita23x17.png';
        imgPalomita.addEventListener('load', function() {
            // Este trozo de código se ejecutará de manera asíncrona cuando la imagen se haya realmente cargado.
            imgCargadas++;
            paintEscena();
          }, false);
      }
    


    /**
     * Función principal para pintar la escena
     */
    function paintEscena () {

        // Sólo pasamos a pintar la escena si nos aseguramos de que las 3 imágenes han sido cargadas correctamente.
        if (imgCargadas == 3) {
            paintFondo();
           
        }
        
       
        //console.log(CoorX);
        //console.log(CoorY);
    } 


    /**
     * Pintamos las dos imágenes que componen el fondo del juego
     */
	function paintFondo () {
		// Pinto el fondo de la escena con el cubo de palitas y la puntuación
        ctx.drawImage(imgFondo, 0, 0);
        ctx.drawImage(imgCubo, CoorX, CoorY, cuboX, cuboY);
        ctx.font = "bold 18px fantasy";
        ctx.fillStyle = "white";
        ctx.fillText("Puntuacion: "+ puntuacion,10,25);
        bucleobs();
        
        ctx.fillText("Tiempo: " + seconds, 1100, 25);
        //updateClock();

        if(finDeJuego == true){
            mover = false;

            ctx.font = "bold 22px fantasy";
            ctx.fillStyle = "white";
            ctx.fillText("Fin de juego, tu puntuación fue: "+ puntuacion,450,25);
        }
        
        
        

    }


    // movimientos del cubo de palomitas
    function moverDerecha(){
        if(mover == true){
            if(CoorX + cuboX  <= canvas.width){
                CoorX =  CoorX+28;
            }else{
                CoorX = canvas.width-cuboX;
            }
        }
               
      }
    
      function moverIzquierda(){
        if(mover == true){
            if(CoorX >= 0){
                CoorX = CoorX-28;    
            }else{
                Coorx =  0;
            }
        }
          
      }
    
      function moverArriba(){
        if(mover == true){
            if(CoorY >= 0){
                CoorY = CoorY-28;
            }else{
                CoorY = 0; 
            }
        }
        
      }
    
      function moverAbajo(){
          if(mover == true){
            CoorY = CoorY + 28;
            if(CoorY + cuboY >= (canvas.height)){
                CoorY = canvas.height - cuboY;
            }
          }
        
    }


    /**
     * Método devuelto por el objeto
     */
    return {
        init: init
        
    }
})();