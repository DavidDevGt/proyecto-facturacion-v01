<?php
// Ver errores PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Carga la configuración inicial
require_once '../config/config.php';

// Define la ruta de inicio predeterminada
$defaultPath = '/inicio';

// Obtener la ruta de la petición
$request = $_SERVER['REQUEST_URI'];

// Normalizar la ruta de solicitud si está en la raíz
if ($request === '/') {
    $request = $defaultPath;
}

// Ruta normalizada sin slashes adicionales
$requestPath = trim($request, '/');

// Incluir el header
include '../includes/header.php';

// Contenedor principal donde se cargará el contenido de las páginas
echo '<div class="container">';


// Enrutamiento
switch ($requestPath) {
    case 'inicio':
        require '../modules/Inicio/index.php';
        break;
    case 'producto':
        require '../modules/Producto/index.php';
        break;
    case 'dashboard':
        require '../modules/Dashboard/index.php';
        break;
    // ... más rutas
    default:
        // Si no se encuentra la ruta, se carga la página de error
        http_response_code(404);
        require '../modules/Error/404.php';
        break;
}

// Cierra el contenedor principal
echo '</div>';

// Incluir el footer
include '../includes/footer.php';
