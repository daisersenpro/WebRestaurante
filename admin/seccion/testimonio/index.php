<?php 
include("../../bd.php");

if(isset($_GET["txtID"])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_testimonios WHERE ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    
    header("Location:index.php");
}


$sentencia=$conexion->prepare("SELECT * FROM `tbl_testimonios`");
$sentencia->execute();
$lista_testimonios= $sentencia->fetchAll(PDO::FETCH_ASSOC);


include ("../../templates/header.php"); ?>

<br/>

<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>  
    </div>
    <div class="card-body">
    
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Opinión</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones </th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($lista_testimonios as $key => $value) { ?>
                    <tr class="">
                        <td scope="row"><?php echo $value['ID']; ?></td>
                        <td> <?php echo $value['opinion']; ?></td>
                        <td><?php echo $value['nombre']; ?></td>
                        <td> 
                            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $value['ID']; ?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['ID']; ?>" role="button">Borrar</a>
                        </td>
                    </tr>
                   <?php } ?>
                </tbody>
            </table>
        </div>
        

    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include ("../../templates/footer.php"); ?>