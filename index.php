<?php
include("admin/bd.php"); //Incluimos el archivo de base de datos

$sentencia=$conexion->prepare("SELECT * FROM tbl_banners ORDER BY id DESC limit 1"); //Obtenemos los banners
$sentencia->execute(); //Ejecutamos
$lista_banners= $sentencia->fetchAll(PDO::FETCH_ASSOC); //Obtenemos todos los registros

$sentencia=$conexion->prepare("SELECT * FROM tbl_colaboradores ORDER BY id DESC limit 4"); //Obtenemos los colaboradores
$sentencia->execute(); //Ejecutamos
$lista_colaboradores= $sentencia->fetchAll(PDO::FETCH_ASSOC); //Obtenemos todos los registros

$sentencia=$conexion->prepare("SELECT * FROM tbl_testimonios ORDER BY id DESC limit 3"); //Obtenemos los testimonios
$sentencia->execute(); //Ejecutamos
$lista_testimonios= $sentencia->fetchAll(PDO::FETCH_ASSOC); //Obtenemos todos los registros

$sentencia=$conexion->prepare("SELECT * FROM tbl_menu ORDER BY id DESC limit 4"); //Obtenemos los Menús
$sentencia->execute(); //Ejecutamos
$lista_menu= $sentencia->fetchAll(PDO::FETCH_ASSOC); //Obtenemos todos los registros

$confirmation_message = ''; // Variable para almacenar el mensaje de confirmación

if($_POST){ /* Envio de datos desde POST del Fomulario */
    //print_r($_POST);

    $nombre=filter_var($_POST["nombre"],FILTER_SANITIZE_STRING); //Sanitizamos el nombre
    $email=filter_var($_POST["correo"],FILTER_SANITIZE_EMAIL); //Sanitizamos el correo
    $mensaje=filter_var($_POST["mensaje"],FILTER_SANITIZE_STRING); //Sanitizamos el mensaje

    if($nombre && $email && $mensaje){ //Verificamos que todos los campos esten completos

        $sql="INSERT INTO tbl_comentarios (nombre,correo,mensaje) VALUES (:nombre,:correo,:mensaje)"; //Insertamos los datos

        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(":nombre",$nombre, PDO::PARAM_STR); //Sanitizamos el nombre
        $resultado->bindParam(":correo",$email, PDO::PARAM_STR); //Sanitizamos el correo
        $resultado->bindParam(":mensaje",$mensaje, PDO::PARAM_STR); //Sanitizamos el mensaje

        $resultado->execute(); //Ejecutamos el insert

        // Variable para Asignar el mensaje de confirmación
        $confirmation_message = '¡Mensaje enviado correctamente!';
        
        //header("Location:index.php"); //Redireccionamos
        
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>SenPro Gourmet</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Sección Menú de Navegación -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark style=" background-color: #222;">
        <div class="container">

            <a class="navbar-brand" href="#navbar"> <i class="fas fa-utensils"></i> SenPro Gourmet </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="nav navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menú del día</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#chefs">Chefs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#testimonios">Testimonio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#horario">Horarios</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Sección Banner -->
    <section id="inicio" class="container-fluid p-0">
        <div class="banner-img"
            style="position: relative; background:url('imagenes/restaurant\ 1.jpg') center/cover no-repeat; height: 400px;">

            <div class="banner-text"
                style="position: absolute; top:50%; left:50%; transform: translate(-50%, -50%); text-align: center; color: black; background-color: rgba(255, 255, 255, 0.3); border-radius: 10px;">

                <?php foreach($lista_banners as $banner) { ?>

                <br />
                <h1> <?php echo $banner['titulo']; ?> </h1>
                <p> <?php echo $banner['descripcion']; ?> </p>
                <a href="<?php echo $banner['link']; ?>" class="btn btn-primary">Ver Menú</a> <br /> <br />

                <?php } ?>
            </div>
        </div>

    </section>
    <!-- Sección Presentación -->
    <section id="id" class="container mt-4 text-center">

        <div class="jumbotron bg-dark text-white" style="border-radius: 10px;">
            <br />
            <h2>¡Bienvenid@ al Restaurant SenPro Gourmet!</h2>
            <p>
                Incorporamos la elegancia del diseño y añadimos un toque de sofisticación culinaria con fusiones de
                sabores y presentaciones únicas. Luego, combinamos armoniosamente elementos temáticos adicionales para
                una experiencia gastronómica incomparable.
            </p>
            <br />
        </div>

    </section>

    <!-- Sección Nuestros Chefs -->
    <section id="chefs" class="container mt-4 text-center">
        <h2>Nuestros Chefs</h2>

        <div class="row">

            <?php foreach($lista_colaboradores as $colaborador) { ?> <!-- foreach para recorrer la lista de colaboradores -->
            <div class="col-md-3">
                <div class="card">
                    <img src="imagenes/colaboradores/<?php echo $colaborador['foto']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $colaborador['titulo']; ?></h5>
                        <p class="card-text"><?php echo $colaborador['descripcion']; ?></p>
                    </div>
                    <div class="social-icons mt-3">
                        <a href="<?php echo $colaborador['linkfacebook']; ?>" class="text-dark me-2"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo $colaborador['linklinkedin']; ?>" class="text-dark me-2"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="<?php echo $colaborador['linkinstagram']; ?>" class="text-dark me-2"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </section>

    <!-- Seccción Testimonios -->
    <section id="testimonios" class="bg-light py-5 text-center">

        <div class="container">

            <h2 class="text-center mb-4"> Testimonios </h2>

            <div class="row">
                <?php foreach($lista_testimonios as $testimonios) { ?> <!-- foreach para recorrer la lista de colaboradores -->
                <div class="col-md-4 d-flex">
                    <div class="card mb-4 w-100">
                        <div class="card-body">
                            <p class="card-text"> <?php echo $testimonios['opinion']; ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            <h6> <?php echo $testimonios['nombre']; ?></h6>
                        </div>
                    </div>
                </div>
                <?php } ?> <!-- Cierre foreach para recorrer la lista de colaboradores -->
            </div>
        </div>

    </section>

    <!-- Sección Menú de comida -->
    <section id="menu" class="container mt-4">
        <h2 class="text-center"> Menú (Nuestra recomendación) </h2>
        <br />

        <div class="row row-cols-1 row-cols-md-4 g-4 text-center">
            <?php foreach($lista_menu as $menu) { ?> <!-- foreach para recorrer la lista de colaboradores -->
            <div class="col d-flex">
                <div class="card">
                    <img src="imagenes/menu/<?php echo $menu['foto']; ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $menu['nombre']; ?></h5>
                        <p class="card-text small"><strong>Ingredientes:</strong> <?php echo $menu['ingredientes']; ?>
                        </p>
                        <p class="card-text"><strong>Precio:</strong> <?php echo $menu['precio']; ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <br />

    <br />

    <!-- Sección de Contacto -->
    <section id="contacto" class="container mt-4">
        <div class="row justify-content-center">
            <!-- Agregamos una fila centrada -->
            <div class="col-lg-6">
                <!-- Columna para centrar el formulario -->
                <h2 class="text-center">Contacto</h2>
                <p class="text-center"><strong>¿Tienes alguna pregunta? ¡No dudes en contactarnos!</strong></p>

                <?php if (!empty($confirmation_message)) { ?>
                <div id="confirmation-message" class="alert alert-success" style="display: none;">
                    <?php echo $confirmation_message; ?> <!-- // Muestra el mensaje de confirmación de envío -->
                </div>
                <?php } ?>

                <form action="?" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label"> <strong> Nombre: </strong> </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Escribe tu nombre.."
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><strong> Correo electrónico: </strong></label>
                        <input type="email" class="form-control" name="correo"
                            placeholder="Escribe tu correo electrónico.." required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label"><strong> Mensaje: </strong></label>
                        <textarea name="mensaje" class="form-control" rows="6" required></textarea>
                    </div>

                    <div class="text-center">
                        <!-- Centramos el botón -->
                        <input type="submit" class="btn btn-primary" value="Enviar Mensaje">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <br />

    <br />

    <!-- División Horario -->
    <div id="horario" class="text-center bg-light p-4">
        <h3 class="mb-4"> Horario de atención</h3>

        <div>
            <p> <strong>Martes a Viernes</strong> </p>
            <p> 12:00 - 23:00 hrs </p>
            <p> <strong>Sábado</strong> </p>
            <p> 11:00 - 17:00 hrs </p>
        </div>
    </div>

    <header>
        <!-- place navbar here -->
    </header>
    <main>


    </main>

    <footer class="bg-dark text-light text-center py-4" style="background-color: #222;">
        <strong> <p class="copyright">Todos los derechos Reservados SenPro Gourmet <?php echo date('Y') ?>
                &copy;</p> </strong>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous">
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous">
    </script>

    <script>
        // Mostrar mensaje de confirmación durante 5 segundos y luego ocultarlo
        var confirmationMessage = document.getElementById('confirmation-message');
        if (confirmationMessage) {
            confirmationMessage.style.display = 'block';
            setTimeout(function () {
                confirmationMessage.style.display = 'none';
            }, 7000);
        }
    </script>

</body>

</html>
