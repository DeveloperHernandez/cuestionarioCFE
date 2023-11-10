<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linea distribución</title>
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
                        <p class="ml-2 mb-0 text-white">Usuario</p>
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


            <!-- Contenido principal -->
            <div class="col-md-9 contenido-principal">
                <h3 class="mt-2">CARACTERÍSTICAS DEL TENDIDO</h3>

                <form>
                    <div class="section">
                        <h5 class="mt-4">A) LÍNEA DE DISTRIBUCIÓN</h5>
                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="num_postes">NUMERO DE POSTES</label>
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="piezas">PIEZAS</label>
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                </div>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso_pieza">PESO/PIEZA</label>
                                    <input type="text" class="form-control" id="peso_pieza" name="peso_pieza">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="num_postes">FLEJES (MTS)</label>
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="piezas">PIEZAS</label>
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                </div>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso_pieza">PESO/PIEZA</label>
                                    <input type="text" class="form-control" id="peso_pieza" name="peso_pieza">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="num_postes">HEBILLAS</label>
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="piezas">PIEZAS</label>
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                </div>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso_pieza">PESO/PIEZA</label>
                                    <input type="text" class="form-control" id="peso_pieza" name="peso_pieza">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="num_postes">HERRAJE D</label>
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="piezas">PIEZAS</label>
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                </div>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso_pieza">PESO/PIEZA</label>
                                    <input type="text" class="form-control" id="peso_pieza" name="peso_pieza">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="num_postes">HERRAJE J</label>
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="piezas">PIEZAS</label>
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                </div>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso_pieza">PESO/PIEZA</label>
                                    <input type="text" class="form-control" id="peso_pieza" name="peso_pieza">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="num_postes">TENSORES</label>
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="piezas">PIEZAS</label>
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                </div>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso_pieza">PESO/PIEZA</label>
                                    <input type="text" class="form-control" id="peso_pieza" name="peso_pieza">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="num_postes">FIBRA ÓPTICA #HILOS</label>
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="piezas">PIEZAS</label>
                                    <input type="text" class="form-control" id="piezas" name="piezas">
                                </div>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso_pieza">PESO/PIEZA</label>
                                    <input type="text" class="form-control" id="peso_pieza" name="peso_pieza">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Enlace a Bootstrap JS (opcional, si necesitas funcionalidades de Bootstrap) -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>
    </div>
</body>

</html>
