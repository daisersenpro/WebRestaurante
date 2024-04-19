<?php

include("../../bd.php"); //Incluimos el archivo de base de datos

    if ($_POST) { //si el formulario es enviado

      $txtID = (isset($_POST["txtID"])) ? $_POST["txtID"] : "";
      $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
      $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
      $linkfacebook = (isset($_POST['linkfacebook'])) ? $_POST['linkfacebook'] : "";
      $linkinstagram = (isset($_POST['linkinstagram'])) ? $_POST['linkinstagram'] : "";
      $linklinkedin = (isset($_POST['linklinkedin'])) ? $_POST['linklinkedin'] : "";

      $sentencia = $conexion->prepare(" UPDATE `tbl_colaboradores` /* se actualizan los datos */
                SET 
                titulo=:titulo, 
                descripcion=:descripcion,
                linkfacebook=:linkfacebook,
                linkinstagram=:linkinstagram,
                linklinkedin=:linklinkedin
                WHERE ID=:id");

      $sentencia->bindParam(":titulo", $titulo);
      $sentencia->bindParam(":descripcion", $descripcion);
      $sentencia->bindParam(":linkfacebook", $linkfacebook);
      $sentencia->bindParam(":linkinstagram", $linkinstagram);
      $sentencia->bindParam(":linklinkedin", $linklinkedin);
      $sentencia->bindParam(":id", $txtID);

      $sentencia->execute(); //ejecuta la sentencia
      header("Location:index.php"); //redireccionamos al index.php

      // Proceso de actualización de foto 
      $foto = (isset($_FILES['foto']["name"])) ? $_FILES['foto']["name"] : "";
      $tmp_foto = $_FILES["foto"]["tmp_name"];

    if ($foto != "") {

      $fecha_foto = new DateTime();
      $nombre_foto = $fecha_foto->getTimestamp() . "_" . $foto;
      move_uploaded_file($tmp_foto, "../../../imagenes/colaboradores/" . $nombre_foto); //se mueve la imagen

      $sentencia = $conexion->prepare("SELECT * FROM `tbl_colaboradores` WHERE ID=:id"); //se insertan los datos
      $sentencia->bindParam(":id", $txtID);
      $sentencia->execute(); //ejecuta la sentencia

      $registro_foto = $sentencia->fetch(PDO::FETCH_LAZY); //se insertan los datos

    if (isset($registro_foto['foto'])) {
      if (file_exists("../../../imagenes/colaboradores/" . $registro_foto['foto'])) {
        unlink("../../../imagenes/colaboradores/" . $registro_foto['foto']);
      }
    }

    $sentencia = $conexion->prepare(" UPDATE `tbl_colaboradores` /* se actualizan los datos */
             SET 
             foto=:foto
             WHERE ID=:id");

    $sentencia->bindParam(":foto", $nombre_foto);
    $sentencia->bindParam(":id", $txtID);

    $sentencia->execute(); //ejecuta la sentencia




  }
}


  if (isset($_GET['txtID'])) { //si el formulario es enviado
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : ""; //isset comprueba si la variable existe

    $sentencia = $conexion->prepare("SELECT * FROM `tbl_colaboradores` WHERE ID=:id"); //se insertan los datos
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY); //se insertan los datos

    // Recuperación de datos ( asignar al formulario )
    $titulo = $registro["titulo"];
    $descripcion = $registro["descripcion"];
    $foto = $registro["foto"];

    $linkfacebook = $registro["linkfacebook"];
    $linkinstagram = $registro["linkinstagram"];
    $linklinkedin = $registro["linklinkedin"];
  }


include("../../templates/header.php"); // se insertan los datos
?>
<br />
<div class="card">
  <div class="card-header">
    <strong> Colaboradores </strong>
  </div>
      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="titulo" class="form-label">ID:</label>
            <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="Escriba el título del banner">
          </div>


          <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label><br />
            <img width="50" src="../../../imagenes/colaboradores/<?php echo $foto; ?>" />
            <br />
            <input type="file" class="form-control" name="foto" id="foto" placeholder="" aria-describedby="fileHelpId">
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" value="<?php echo $titulo; ?>" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Título">

          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" value="<?php echo $descripcion; ?>" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="">
          </div>

          <div class="mb-3">
            <label for="linkfacebook" class="form-label">Facebook:</label>
            <input type="text" value="<?php echo $linkfacebook; ?>" class="form-control" name="linkfacebook" id="linkfacebook" aria-describedby="helpId" placeholder="">

          </div>

          <div class="mb-3">
            <label for="linkinstagram" class="form-label">Instagram:</label>
            <input type="text" value="<?php echo $linkinstagram; ?>" class="form-control" name="linkinstagram" id="linkinstagram" aria-describedby="helpId" placeholder="">

          </div>

      <div class="mb-3">
        <label for="linklinkedin" class="form-label">Linkedin:</label>
        <input type="text" value="<?php echo $linklinkedin; ?>" class="form-control" name="linklinkedin" id="linklinkedin" aria-describedby="helpId" placeholder="">

      </div>

      <button type="submit" class="btn btn-success">Modificar colaborador </button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


    </form>
  </div>
  <div class="card-footer text-muted">

  </div>
</div>


<?php
  include("../../templates/footer.php"); // se insertan los datos
?>