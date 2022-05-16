<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# README.MD
Este proyecto es una api REST hecha en laravel, la cual provee los métodos de inicio de sesión, crear un usuario, editarlo y cerrar sesión

## How to clone
Para realizar la instalación del proyecto es necesario realizar la configuración correspodiente al archivo 
.env, en donde se deben registrar los datos pertinentes en cuanto al nombre de la base de datos, así como también el usuario y contraseña para acceder a la base de datos. Luego se deben ingresar los siguientes comandos en la terminal ubicándose en la carpeta del proyecto:
```
composer install
```
```
php artisan key:generate
```
```
php artisan migrate
```
Luego para poder estar activo y recibir peticiones se debe ingresar el siguiente comando
```
php artisan serve --port 8000
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

