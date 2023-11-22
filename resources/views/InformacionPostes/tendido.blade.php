<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tendido</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <style>
    /* Estilo para el menú lateral */
    .menu-lateral {
        background-color: #333;
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        padding: 20px;
        color: white;
    }

    /* Estilo para el logotipo */
    .logo {
        max-width: 100px;
        margin-bottom: 20px;
    }

    /* Estilo para los elementos del menú */
    .nav-item {
        padding: 10px 0;
        text-align: center;
        font-size: 18px;
    }

    .nav-item:hover {
        background-color: #555;
    }

    /* Estilo para el contenido principal */
    .contenido-principal {
        margin-left: 250px;
        padding: 20px;
    }

    /* Estilo para la tarjeta que contiene la información del usuario */
    .card-usuario {
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    /* Estilo para el botón "Volver a la lista de usuarios" */
    .btn-volver {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 menu-lateral">
                <div class="text-center">
                    <img src="{{ asset('img/logoRVA.png') }}" alt="Logo de la aplicación" class="img-fluid logo">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('registro') }}">Cuestionario tendido de
                            fibra óptica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('informacion_postes') }}">Información postes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('salir') }}">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            <!-- Formulario -->
            <div class="col-md-9 contenido-principal">
                @if(Session::has('success'))
                <div id="success-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <h3 class="mt-2">TENDIDO</h5>
                    <p>En el siguiente formato describir los materiales a utilizar en el tendido, incluir modelo y
                        anexar ficha técnica (tabla de características del tendido)**La información en color azul es un
                        ejemplo, usted debera llenar las tablas de acuerdo a la información de su proyecto.
                        Activar la compatib</p>

                    <form method="post" action="{{ route('guardar_tendido') }}">
                        @csrf
                        <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">

                        <div class="mb-3">
                            <label for="flejes" class="form-label">FLEJES</label>
                            <input type="text" class="form-control" id="flejes" name="flejes"
                                placeholder="MODELO:WXY           FICHA TÉCNICA:  H5/8 TULIKO">
                            @error('flejes')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hebillas" class="form-label">HEBILLAS</label>
                            <input type="text" class="form-control" id="hebillas" name="hebillas"
                                placeholder="MODELO: HYN         FICHA TÉCNICA H5/8 TULIKO">
                            @error('hebillas')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="herraje_j" class="form-label">HERRAJE TIPO J</label>
                            <input type="text" class="form-control" id="herraje_j" name="herraje_j"
                                placeholder="MODELO: OPHAHEJ8          FICHA TÉCNICA OPHAHEJ8-12MMPW">
                            @error('herraje_j')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="herraje_d" class="form-label">HERRAJE TIPO D (INCLUIR MEDIDAS)</label>
                            <input type="text" class="form-control" id="herraje_d" name="herraje_d"
                                placeholder="MODELO: LP-SDC               FICHA TÉCNICA LP-SDC">
                            @error('herraje_d')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tensor" class="form-label">TENSOR (Incluir medidas)</label>
                            <input type="text" class="form-control" id="tensor" name="tensor"
                                placeholder="MODELO:OPHARPA  FICHA TÉCNICA OPHARPACGA18">
                            @error('tensor')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fibra_optica" class="form-label">FIBRA ÓPTICA (Incluir número de Hilos)</label>
                            <input type="text" class="form-control" id="fibra_optica" name="fibra_optica"
                                placeholder="MODELO:FSTN9  FICHA TÉCNICA FSTN924">
                            @error('fibra_optica')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="caja_distribucion" class="form-label">CAJAS DE DISTRIBUCIÓN</label>
                            <input type="text" class="form-control" id="caja_distribucion" name="caja_distribucion"
                                placeholder="MODELO:FDP-42  FICHA TÉCNICA FDP-420E">
                            @error('caja_distribucion')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="caja_empalme" class="form-label">CAJAS DE EMPALME</label>
                            <input type="text" class="form-control" id="caja_empalme" name="caja_empalme"
                                placeholder="MODELO:CEH192  FICHA TÉCNICA OPCEH19268HT">
                            @error('caja_empalme')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="raquetas" class="form-label">RAQUETAS</label>
                            <input type="text" class="form-control" id="raquetas" name="raquetas"
                                placeholder="MODELO:LP-SF-S   FICHA TÉCNICA LP-SF-SC-12">
                            @error('raquetas')
                            <div class="alert alert-danger alert-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('siguiente_troncal') }}" class="btn btn-primary">SIGUIENTE</a>
                            </div>
                        </div>
                    </form>
            </div>

            <!-- Enlace a Bootstrap JS (opcional, si necesitas funcionalidades de Bootstrap) -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script>
            // Espera a que el DOM esté completamente cargado
            document.addEventListener("DOMContentLoaded", function() {
                // Espera 5 segundos y oculta el mensaje de éxito
                setTimeout(function() {
                    $("#success-message").fadeOut(500); // 500 milisegundos para desaparecer
                }, 5000); // 5000 milisegundos = 5 segundos
            });
            </script>
        </div>
    </div>
</body>

</html>