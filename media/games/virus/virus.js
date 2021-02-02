
var game = (function (){
    cWidth = 450,
    cHeight = 500;
    class Player{
        constructor(){
            this.width = 70;
            this.height = 100;
            this.posX = (cWidth / 2)- this.width;
            this.posY = (cHeight/2)+ this.height;            
            this.lives = 3;
        }
    }
    class Virus{
        constructor(){
            this.width = 89;
            this.height = 89;
            this.posX = getRandomNumber(cWidth - this.width);
            this.posY = -1;
            this.lives = 5;
            this.src = virusImg;
        }
    }

    


    //variables globales del juego

    var canvas,
    player,
    playerImg = new Image(),
    playerShotImage = new Image(),    
    virus,
    virusImg = new Image(),
    virusShotImg = new Image(),
    ctx,
    imgBackground = new Image(),
    virusDead = new Image(),
    score = 0,
    shotsP = [],
    shotsV = [],
    virusShotSize = 27,
    fire = false,
    timer,
    gameLoop,    
    dx = 2,
    dy = -2;
    imgBackground.src = 'images/fondo.jpg';
    playerImg.src = 'images/playerImg.png';
    virusImg.src = 'images/virusImg1.png';
    playerShotImage.src = 'images/playerShot.png';
    virusShotImg.src = 'images/virusShot.png';
    virusDead.src = 'images/muerto.png';

    function init(){ 
       
        shotsP.length = 0;
        shotsV.length =0;
        score = 0;      
        timer =  80; 
        
        if (typeof gameLoop != "undefined"){
            clearInterval(gameLoop);
        }
        gameLoop = setInterval(main, 33);
        

        player= new Player();
        virus = new Virus();
         
        canvas = document.getElementById("canvas");
        ctx = canvas.getContext("2d");
        
        document.addEventListener("keydown", function(e){
            if(e.keyCode == 37){ //izquierda
                if(player.posX >-30 ) //juego con el vertice x, si la posX del player es mayor de -30 se moverá a la izquierda
                player.posX -= 7;
            }
            if(e.keyCode == 39){ //derecha
                if(player.posX < (cWidth - 125) )//si la posicion del jugador es menor del ancho del canvas - el ancho de la imagen del player se sigue sumando el movimiento
                player.posX += 7;
            }
            if(e.keyCode == 32){ // espacio
               fire = true; //bandera que me dira si disparo o no
                
            }
        });

        document.addEventListener("keyup", function(e) {
            if(e.keyCode == 32){
                fire = false;
            }
            
        })
        
    }

    function main(){
                      
        paint();    
        virusShoots();    
        virusAct();
        playerShoot();
       checkCollisions();       
        killVirus(); 
        isGameOver();
        
    }

    function paint(){ 
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(imgBackground, 0, 0);        
        
        //pinto virus si le quedan vidas
        if(virus.lives > 0){
            ctx.drawImage(virus.src, virus.posX , virus.posY);
        }  
        
        if(player.lives > 0){
            ctx.drawImage(playerImg, player.posX , player.posY);
            

            if(virus.lives > 0){
                //pinto disparos del player con un array para poder disparar varias veces
                if(fire==true){
                    shotsP.push({'x':player.posX + (player.width/2) - 60, 'y':player.posY, 'img':playerShotImage});
                    fire = false;
                }
                
                for (var i=0; i<shotsP.length; i++) {                                 
                    ctx.drawImage(shotsP[i].img, shotsP[i].x, shotsP[i].y);     
                }
                //pinto disparos del virus
                for(var i=0; i<shotsV.length; i++){
                        shotsV[i].y += 3
                        ctx.drawImage(virusShotImg, shotsV[i].x, shotsV[i].y);
                }
            }    

            
            
        }

        //pintar puntos y vida
        ctx.font = "bold 12px sans-serif";
        ctx.fillStyle = "white";
        ctx.fillText("Score: "+score, 10,15);
        ctx.fillText("Lives: "+player.lives, canvas.width-80, 15);

       
    }

    function virusShoots() {
        var num = getRandomNumber(300);
        
       if(num<2){          
            shotsV.push({'x':virus.posX + (virus.width/2), 'y':virus.posY});
        }
            
        
    }



    function virusAct(){
        //solo se ejecutará mientras le queden vidas al virus
        if(virus.lives > 0){
            virus.posX += dx;
            virus.posY += dy;

            if(virus.posX + dx > cWidth - virus.width || virus.posX + dx < 1){
                dx = -dx;
            }
            if (virus.posY + dy > 120 || virus.posY + dy < 1){
                dy = -dy;
            } 
            virus.posX += dx;
            virus.posY += dy;
        }

    }

    function playerShoot(){        
       
        for (var i = 0; i < shotsP.length; i++) {
            shotsP[i].y -= 7;

            //si disparo jugador se sale del canvas
            if(shotsP[i].y <= 0){
                shotsP.splice(i, 1);
                continue;
            }
            
        }

        for(var i=0;i<shotsV.length;i++){
            if(shotsV[i].y + 4 >= canvas.height){
                shotsV.splice(i, 1);
            }
        }
    }

    function checkCollisions(){       
        // compruebo colision de los disparos del player con el virus
        for(var i=0; i<shotsP.length; i++){
            if(shotsP[i].y <= virus.posY + virus.height && shotsP[i].y >= virus.posY){
                if((shotsP[i].x >=virus.posX && shotsP[i].x <= virus.posX + virus.width)||(shotsP[i].x + 2 >= virus.posX && shotsP[i] + 2 <= virus.posX + virus.width)){
                    score++;
                    virus.lives --;	
                    console.log("Vidas del virus: "+ virus.lives);				
					console.log("Puntos del player: "+ score);
					shotsP.splice(i, 1);
                }
            }
        }
        //colision contra virus pequeños
       /* for(var i=0;i<shotsV.length;i++){
            for(var j=0;j<shotsP.length;j++){
    
               if( shotsP[j].y + 2 <= shotsV[i].y + virusShotSize && ((shotsP[j].x >= shotsV[i].x && shotsP[j].x <= shotsV[i].x + virusShotSize) || (shotsP[j].x + 2 >= shotsV[i].x && shotsP[j].x + 2 <= shotsV[i].x + virusShotSize)) ){
                   score ++; 
                   shotsV.splice(i, 1);
                   shotsP.splice(j, 1);
               }
            }
        }*/

        // compruebo colision virus
	
		/*if(virus.posY + virus.height >= player.posY){
			if( (virus.posX >= player.posX && virus.posX <= player.posX + player.width) || (virus.posX + virus.width >= player.posX && virus.posX + virus.width <= player.posX + player.width) ){ 
				
				virus.lives--;
			}
		}*/
	

        //compruebo colision de los disparos del virus al player
        for(var i=0;i<shotsV.length;i++){
            if(shotsV[i].y + 2 >= player.posY){
                if( (shotsV[i].x >= player.posX && shotsV[i].x <= player.posX + player.width) || (shotsV[i].x + 2 >= player.posX && shotsV[i].x + 2 <= player.posX + player.width) ){
                    player.lives--;
                    shotsV.splice(i, 1);							
                }
            }
        }
	
    }


    function killVirus() {
        //si la vida del virus llega a 0 cambio la imagen del virus
        if(virus.lives == 0){
            virus.src = virusDead;
            ctx.drawImage(virus.src, virus.posX, virus.posY);
        }
    }

    function isGameOver(){
        if(player.lives == 0){
            ctx.font = "bold 30px sans-serif";
            ctx.fillStyle = "red";
            ctx.fillText("GAME OVER", canvas.width/2 - 80, canvas.height/2);  
           // document.getElementById('p').innerHTML = '<button  id="restart" onclick='+game.init()+'>Restart</button>';      
        }
        if(virus.lives == 0){
            ctx.font = "bold 30px sans-serif";
            ctx.fillStyle = "blue";
            ctx.fillText("¡HAS GANADO!", canvas.width/2 - 100, canvas.height/2);
           // document.getElementById('p').innerHTML = '<button  id="restart" onclick='+game.init()+'>Restart</button>';
        }

        
    }



    


    function getRandomNumber(max){
        return Math.floor(Math.random() * max);
    }

    return {
        init: init
    }
})();