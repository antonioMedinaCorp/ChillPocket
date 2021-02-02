# basic-sample-php-template-example
Explanation for organizing the file structure
pasos a seguir para instalar node-sass:

INSTALAR NODE.JS EN TU PC

1.-Abrir la carpeta que quieras, en este caso puntocritico. No vale abrir chillpocket.

2.- Terminal-> New terminal y antes de escribir nada comprobar la ruta en la consola

3.- npm init -> npm install -g node-sass

4.- Pulsar Terminal->Configure Tasks->npm install

5.- Se creará la carpeta .vscode y el archivo task.json. En el archivo copiar en el grupo task lo siguiente:
    		{
			"label": "Sass Compile",
			"type": "shell",
			"command": "node-sass -w scss/mystyle.scss css/mystyle.css",
			"group": "build",
			"problemMatcher": []
		}

6.- COMPROBAR LAS RUTAS EN EL APARTADO COMMAND
7.- Terminal->Run Task->Sass compile
8.- Modificar el archivo .scss para ver si compila