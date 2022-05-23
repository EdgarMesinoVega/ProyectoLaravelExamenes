Alumno:Mesino Vega Edgar Said <br>
Numero de control: 18520430

Para instalar este proyecto debemos seguir los siguientes pasos:

Paso 1 : en la terminal poner el siguiente comando:     composer install <br>
Paso 2 : instalamos el npm con el siguiente comando:    npm install <br>
Paso 3 : En mysql creamos la base de datos llamada:     'sistema' <br>
Paso 4 : hacemos una copia de nuestro archivo env:      copy .env.example .env <br>
Paso 5 : Desde nuestro proyecto hacemos la migracion:   php artisan migrate <br>
paso 6 : generamos una llave de encriptacion:           php artisan key:generate  <br>

Listo ya deberia funcionar correctamente, en caso que no funcione, 
adjunto un enlace que ayudara: 
https://luisferfranco.com/como-instalar-un-proyecto-de-laravel-desde-un-servidor-git/
