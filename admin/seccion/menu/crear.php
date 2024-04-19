<?php 
include("../../bd.php");
if($_POST){

    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $ingredientes=(isset($_POST["ingredientes"]))?$_POST["ingredientes"]:"";
    $precio=(isset($_POST["precio"]))?$_POST["precio"]:"";

    $sentencia=$conexion->prepare("INSERT INTO 
    `tbl_menu` (`ID`, `nombre`, `ingredientes`,`foto`,`precio`) 
    VALUES (NULL,:nombre,:ingredientes,:foto,:precio);");

    $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
    $fecha_foto= new DateTime();
    $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
    $tmp_foto= $_FILES["foto"]["tmp_name"];

    if($tmp_foto!=""){
      move_uploaded_file($tmp_foto,"../../../imagenes/menu/".$nombre_foto);
    }

    $sentencia->bindParam(":foto", $nombre_foto);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":ingredientes",$ingredientes);
    $sentencia->bindParam(":precio",$precio);

    $sentencia->execute();
    header("Location:index.php");
}

include ("../../templates/header.php"); ?>
<br/>
<div class="card">
    <div class="card-header">
       <strong> Menú de comida </strong> 
    </div>
    <div class="card-body">
    
    <form action="" method="post" enctype="multipart/form-data" >

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text"
        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre:">
    </div>

    <div class="mb-3">
      <label for="ingredientes" class="form-label">Ingredientes (separados por comas):</label>
      <input type="text"
        class="form-control" name="ingredientes" id="ingredientes" aria-describedby="helpId" placeholder="Ingredientes">
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Foto:</label>
      <input type="file" class="form-control" name="foto" id="foto" placeholder="" aria-describedby="fileHelpId">
    </div>


    <div class="mb-3">
      <label for="precio" class="form-label">Precio:</label>
      <input type="text"
        class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio">
      
    </div>

    <button type="submit" class="btn btn-success">Agregar comida </button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>




    </form>

    </div>
    <div class="card-footer text-muted">
    
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>