<?php include('templates/header.php'); ?>

    <div class="row align-items-md-stretch">
        <div class="col-md-12"> <!-- ancho del row -->
            <div class="h-100 p-5 border rounded-3">
                <h2>Bienvenid@  al Administrador <?php echo $_SESSION['usuario']; ?></h2>
                <p>
                   Este espacio es para administrar su Sitio Web.
                </p>
                
                <!-- <button class="btn btn-outline-primary type="button">Iniciar ahora</button> -->
            </div>
        </div>

    </div>
    



<?php include('templates/footer.php'); ?>