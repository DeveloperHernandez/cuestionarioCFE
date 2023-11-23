<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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

    @media (max-width: 767px) {

        /* Oculta el menú lateral en tamaños de pantalla pequeños */
        .menu-lateral {
            display: none;
        }

        /* Ajusta el margen izquierdo del contenido principal */
        .contenido-principal {
            margin-left: 0;
        }
    }
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 menu-lateral">
                <div class="text-center">
                    <img src="{{ asset('img/logoRVA.png') }}" alt="Logo de la aplicación" class="img-fluid logo"><br>
                    BIENVENIDO: {{ isset($ver['nombre_usuario']) ? $ver['nombre_usuario'] : 'No hay usuario' }}
                    USUARIO: {{ isset($ver['id_usuario']) ? $ver['id_usuario'] : 'No hay usuario' }}
                    <br><br>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('registro') }}">Cuestionario tendido de fibra
                            óptica</a>
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
                <form method="POST" action="{{ route('guardar_informacion') }}">
                    @csrf
                    <p class="text-center font-weight-bold" style="border: 2px solid #ff0000; font-weight: bold;">
                        Estimado cliente, el presente cuestionario tiene la finalidad de tener la información precisa
                        para la realización correcta de la estructura del plano, que posteriormente se presentará para
                        el estudio de acceso ante Comisión Federal de Electricidad, para obtener los permisos para el
                        uso de su infraestructura.
                    </p>
                    <br>
                    <h5> Instrucciones. Responda cada una de las preguntas de manera clara.</h5>
                    <h6> 1. Para el registro y las notificaciones por parte de la CFE, solicito se me indique la
                        siguiente información, siendo los campos en color verde la persona que recibirá las claves de
                        acceso para el uso del sistema.</h6>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre_cliente">NOMBRE(S)</label>
                                <input style="border: 3px solid rgb(49, 131, 49);" type="text"
                                    class="form-control @error('nombre_cliente') is-invalid @enderror"
                                    id="nombre_cliente" name="nombre_cliente" value="{{$ver['nombre_usuario']}}">
                                @error('nombre_cliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="domicilio">DOMICILIO</label>
                                <input style="border: 3px solid rgb(49, 131, 49);" type="text"
                                    class="form-control @error('domicilio') is-invalid @enderror" id="domicilio"
                                    name="domicilio">
                                @error('domicilio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correo_electronico">CORREO ELECTRÓNICO</label>
                                <input style="border: 3px solid rgb(49, 131, 49);" type="email"
                                    class="form-control @error('correo_electronico') is-invalid @enderror"
                                    id="correo_electronico" name="correo_electronico"
                                    value="{{$ver['correo_electronico']}}">
                                @error('correo_electronico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="persona_autorizada">PERSONA AUTORIZADA</label>
                                <input type="text"
                                    class="form-control @error('persona_autorizada') is-invalid @enderror"
                                    id="persona_autorizada" name="persona_autorizada">
                                @error('persona_autorizada')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correos">CORREOS</label>
                                <input type="text" class="form-control @error('correos') is-invalid @enderror"
                                    id="correos" name="correos">
                                @error('correos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefonos">NÚMEROS TELEFÓNICOS</label>
                                <input type="text" class="form-control @error('telefonos') is-invalid @enderror" id="telefonos" name="telefonos">
                                @error('telefonos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('siguiente_geoestadistica') }}" class="btn btn-primary">SIGUIENTE</a>
                            </div>
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

