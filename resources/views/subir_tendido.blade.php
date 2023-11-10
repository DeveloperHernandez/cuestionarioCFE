<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir tendido</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para el fondo gris del menú lateral */
        .menu-lateral {
            background-color: #8e8e8e; /* Cambia el color de fondo del menú */
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            /* Ancho del menú lateral */
            transition: width 0.3s;
            /* Transición para plegar/desplegar el menú */
            z-index: 1;
        }

        /* Estilo para los elementos del menú */
        .nav-item {
            padding: 10px;
            text-align: center;
            font-size: 18px; /* Aumenta el tamaño del texto */
        }

        /* Cambia el color de texto y fondo en el hover */
        .nav-item:hover {
            background-color: #555;
            color: white;
        }

        /* Estilo para el contenido principal */
        .contenido-principal {
            margin-left: 250px;
            /* Ancho del menú lateral */
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 menu-lateral">
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="img/logoRVA.png" alt="Logo de la aplicación" class="img-fluid"
                            style="max-width: 100px;">
                        <p class="ml-2 mb-0 text-white">Administrador</p>
                    </div>
                </div>
                <ul class="nav flex-column">
                    <!-- Tus elementos li con efecto hover mejorado -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/registro_usuario">Cuestionario tendido de fibra óptica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/editar">Información postes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/eliminar_usuario">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
            
            <!-- Formulario -->
            <div class="col-md-9 contenido-principal">
                <form method="post">
                    @csrf 

                    <p>8. Asi mismo se requiere que  adjunte un pano del lugar/es expedido por el municipio correspondiente, donde deberá indicar el nombre de las calles que pertenecen a dicho municipio.(Esto con la finalidad de tener la certeza de la distribución y nombre de las calles). En caso de NO tener acceso a dicha información puede ser sustituido por un archivo KMZ georreferenciado utilizando la herramienta de Google Earth. Dentro del archivo KMZ, deberá indicar el recorrido de la ruta, en caso de ocupar más de un tipo de fibra óptica indicarlo en el archivo KMZ con una simbología diferente. (Se le proporciona archivo ejemplo adjunto al correo).</p>
                    <div class="container">
                        <div class="row">                            
                            <div class="form-group">
                                <div class="container">
                                    <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                      <label for="banner">Enviar al correo:</label>
                                      <div class="input-group">
                                          <label class="input-group-btn">
                                              <span class="btn btn-primary btn-file">
                                                  <input accept=".jpg,.png,.jpeg,.gif" class="hidden" name="banner" type="file" id="banner">
                                              </span>
                                          </label>
                                      </div>
                                  </div>
                            </div>
                         </div>
                    </div>
                    <p>9. El proveedor del cable de fibra óptica y materiales a utilizar para el tendido, deberá proporcionarle una ficha técnica con las especificaciones de los elementos como son: Su peso, número de hilos, longitud, etc., dicha ficha técnica deberá enviarla para su revisión, ya que la información contenida se utilizará para incluirla en el plano y documentos anexos.</p>
                    <div class="container">
                        <div class="row">                            
                            <div class="form-group">
                                <div class="container">
                                    <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                      <label for="banner">Enviar al correo:</label>
                                      <div class="input-group">
                                          <label class="input-group-btn">
                                              <span class="btn btn-primary btn-file">
                                                  <input accept=".jpg,.png,.jpeg,.gif" class="hidden" name="banner" type="file" id="banner">
                                              </span>
                                          </label>
                                      </div>
                                  </div>
                            </div>
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).on('change','.btn-file :file',function(){
  var input = $(this);
  var numFiles = input.get(0).files ? input.get(0).files.length : 1;
  var label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
  input.trigger('fileselect',[numFiles,label]);
});
$(document).ready(function(){
  $('.btn-file :file').on('fileselect',function(event,numFiles,label){
    var input = $(this).parents('.input-group').find(':text');
    var log = numFiles > 1 ? numFiles + ' files selected' : label;
    if(input.length){ input.val(log); }else{ if (log) alert(log); }
  });
});
    </script>
</body>
</html>
