<?php
//include("conexion/bd.php");

if (isset($_POST['ingresar'])) {
    $correo = $_POST['email'];
    $passw = $_POST['passw'];

    $result = $database->select("perfil", "*");

    echo $result[0];

    if (count($result)>0) {
        for ($i=0; $i <count($result); $i++) { 
            if ($result[$i]["correo"]===$correo) {
                $user= $result[$i];
            }
        }
    }else {
        $error = "Usuario invalido";
        header("location: login.php");
    }
    

    echo $user[0];

    if (count($user) > 0) {
        if ($user[0]['contrasenhia'] === $passw && $user[0]['correo'] === $correo) {
            header("location: index.php");
        } else {
            $error = "Error en la contraseña";
            header("location: login.php");
        }
    } else {
        $error = "Usuario invalido";
        header("location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>

    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">

    <script src="https://kit.fontawesome.com/48ce04dd4f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swipper -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!-- Fuentes Alegreya Sans para titulos, subtitulos y botones, Roboto para textos largos-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <section>
            <div class="hero">
                <nav>
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <a href="index.php"><img src="imgs/logo.svg" class="logo"></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="registro-receta.html">Añadir receta</a>
                                    </li>
                                    <!--<li class="nav-item">
                                        <a class="nav-link active" href="#">Filtro</a>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <img src="imgs/usuario.svg" class="user-pic" onclick="toggleMenu()">

                    <div class="sub-menu-wrap" id="subMenu" style="right:0px;">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="imgs/usuario.svg">
                                <h3>Nombre Usuario</h3>
                            </div>
                            <hr>
                            <a href="perfil-usuario.html" class="submenu-link">
                                <i class="fa-solid fa-user i-icon"></i>
                                <p>Cuenta</p>
                                <span><i class="fa-solid"></i></span>
                            </a>
                            <hr>
                            <a href="recuperar-contrasenia.html" class="submenu-link">
                                <i class="fa-solid fa-circle-question i-icon"></i>
                                <p>Cambiar contraseña</p>
                                <span><i class="fa-solid"></i></span>
                            </a>
                            <hr>
                            <a href="login.html" class="submenu-link">
                                <i class="fa-solid fa-right-from-bracket i-icon"></i>
                                <p>Salir</p>
                                <span><i class="fa-solid"></i></span>
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
        </section>

        <section class="container-fluid box-title">
            <h1 class="text-center">Tus recetas favoritas en un mismo sitio</h1>
        </section>

        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/nav.js"></script>
    </header>

    <main class="d-flex align-items-center justify-content-center mt-5 mb-4 text-light">
        <section>
            <div class="container-fluid box-gray pt-1 pb-3">
                <form class="needs-validation">
                    <h1 class="text-center">Iniciar sesión</h1>

                    <div class="form-group was-validated">
                        <input class="form-control" type="email" name="email" placeholder="Correo electrónico" required>
                        <div class="invalid-feedback">Debe ingresar su correo electrónico</div>
                    </div>

                    <div class="form-group was-validated">
                        <input class="form-control" type="password" name="passw" placeholder="Contraseña" required>
                        <div class="invalid-feedback">Debe ingresar su contraseña</div>
                    </div>

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" id="check">
                        <label class="form-check-label" for="check">Recordar</label>
                    </div>
                    <button class="btn-br w-100" type="submit" name="ingresar">Ingresar</button>

                </form>
                <div class="text-center mt-2">
                    <a class="text-decoration-none text-white" href="recuperar-contrasenia.html">Recuperar contraseña</a>
                </div>

            </div>
            <div class="text-center mt-2">
                <a href="registro.html" class="text-center text-decoration-none text-light">Registrarse</a>
            </div>
        </section>
    </main>

    <footer class="footer text-center text-lg-start pb-2 pt-3">
        <div class="container d-flex justify-content-center p-0">
            <a href="https://gitlab.com/krisarias/gusticos" type="button" class="btn-br mx-2 p-md-2 btn-footer">
                <i class="fab fa-facebook-f min-w-20 text-center"></i>
                </button></a>
            <a href="https://gitlab.com/krisarias/gusticos" type="button" class="btn-br mx-2 p-md-2 btn-footer">
                <i class="fab fa-youtube min-w-20 text-center"></i>
                </button></a>
            <a href="https://gitlab.com/krisarias/gusticos" type="button" class="btn-br mx-2 p-md-2 btn-footer">
                <i class="fab fa-instagram min-w-20 text-center"> </i>
                </button></a>
            <a href="https://gitlab.com/krisarias/gusticos" type="button" class="btn-br mx-2 p-md-2 btn-footer ">
                <i class="fab fa-twitter min-w-20 text-center"> </i>
                </button></a>
        </div>
        <div class="text-center text-white">
            ©2022 Copyright:
            <a class="text-white" href="https://gitlab.com/krisarias/gusticos">UCR Estudiantes</a>
        </div>
    </footer>
</body>

</html>