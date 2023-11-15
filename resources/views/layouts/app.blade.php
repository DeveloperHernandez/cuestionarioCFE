<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title> <!-- Usamos una sección para el título -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Agrega aquí tus estilos CSS personalizados si los tienes -->
</head>
<body>
    <header>
        <!-- Aquí puedes agregar tu barra de navegación o encabezado -->
    </header>

    <main>
        @yield('content') <!-- Esta sección contendrá el contenido específico de cada vista -->
    </main>

    <footer>
        <!-- Aquí puedes agregar tu pie de página o información adicional -->
    </footer>

    <!-- Incluye la biblioteca JS de Bootstrap al final del cuerpo del documento -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Agrega aquí tus scripts JavaScript personalizados si los tienes -->
</body>
</html>
