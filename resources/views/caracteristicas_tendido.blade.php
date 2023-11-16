<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Características tendido</title>
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
                        <a class="nav-link text-white" href="{{ route('registro') }}">Cuestionario tendido de fibra óptica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('informacion_postes') }}">Información postes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('salir')}}">Cerrar sesión</a>
                    </li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-9 contenido-principal">
                <form method="post">
                    <p class="font-weight-bold">
                        En el siguiente formato describir los materiales a utilizar en el tendido, incluir modelo y anexar ficha técnica (tabla de características del tendido)**La información en color azul es un ejemplo, usted deberá llenar las tablas de acuerdo a la información de su proyecto.
                    </p>
                    <br>
                    <div class="row">

                            <div class="form-group">
                                <label for="nombres">FLEJES</label>
                                <input type="text" class="form-control"
                                    id="nombres" name="nombres" placeholder="MODELO: WXY FICHA TÉCNICA: H5/8 TULIKO">
                            </div>
                        

                            <div class="form-group">
                                <label for="domicilio">HEBILLAS</label>
                                <input type="text" class="form-control"
                                    id="domicilio" name="domicilio" placeholder="MODELO: HYN FICHA TÉCNICA H5/8 TULIKO">
                            </div>
                        
                            <div class="form-group">
                                <label for="correo">HERRAJE TIPO J</label>
                                <input type="email" class="form-control"
                                    id="correo" name="correo" placeholder="MODELO: OPHAHEJ8 FICHA TÉCNICA OPHAHEJ8-12MMPW">
                            </div>

                            <div class="form-group">
                                <label for="correo">HERRAJE TIPO D  (INCLIUIR MEDIDAS)</label>
                                <input type="email" class="form-control"
                                    id="correo" name="correo" placeholder="MODELO: LP-SDC FICHA TÉCNICA LP-SDC">
                            </div>
                            <div class="form-group">
                                <label for="domicilio">TENSOR (INCLUIR MEDIDA)</label>
                                <input type="text" class="form-control"
                                    id="domicilio" name="domicilio" placeholder="MODELO: OPHARPA FICHA TÉCNICA OPHARPACGA18">
                            </div>
                        
                            <div class="form-group">
                                <label for="correo">FIBRA ÓPTICA (INCLUIR NÚMERO DE HILOS)</label>
                                <input type="email" class="form-control"
                                    id="correo" name="correo" placeholder="MODELO:FSTN9  FICHA TÉCNICA FSTN924">
                            </div>

                            <div class="form-group">
                                <label for="correo">CAJAS DE DISTRIBUCIÓN </label>
                                <input type="email" class="form-control"
                                    id="correo" name="correo" placeholder="MODELO:FDP-42  FICHA TECNICA FDP-420E">
                            </div>

                            <div class="form-group">
                                <label for="correo">CAJAS DE EMPALME</label>
                                <input type="email" class="form-control"
                                    id="correo" name="correo" placeholder="MODELO: CEH192 FICHA TÉCNICA OPCEH19268HT">
                            </div>

                            <div class="form-group">
                                <label for="correo">RAQUETAS</label>
                                <input type="email" class="form-control"
                                    id="correo" name="correo" placeholder="MODELO:LP-SF-S FICHA TÉCNICA LP-SF-SC-12">
                            </div>

                    </div>
                    <br>


                    <br>
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
