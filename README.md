Alumno:Mesino Vega Edgar Said
Numero de control: 18520430

Para instalar este proyecto debemos seguir los siguientes pasos:

Paso 1 : en la terminal poner el siguiente comando:     composer install
Paso 2 : instalamos el npm con el siguiente comando:    npm install
Paso 3 : En mysql creamos la base de datos llamada:     'sistema'
Paso 4 : hacemos una copia de nuestro archivo env:      copy .env.example .env
Paso 5 : Desde nuestro proyecto hacemos la migracion:   php artisan migrate
paso 6 : generamos una llave de encriptacion:           php artisan key:generate

Listo ya deberia funcionar correctamente, en caso que no funcione, 
adjunto un enlace que ayudara: 
https://luisferfranco.com/como-instalar-un-proyecto-de-laravel-desde-un-servidor-git/
