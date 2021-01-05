<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id_zoologico = $_GET['id'];
        $query = "SELECT nombre_zoologico, presupuesto, tamanio FROM zoologico WHERE id_zoologico=$id_zoologico";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $nom_zoo = $row['nombre_zoologico'];
            $presu = $row['presupuesto'];
            $tam = $row['tamanio'];
        }
    }


    if(isset($_POST['update'])){
        $id_zoo = $_GET['id'];
        $nom_zoo = $_POST['nom_zoo'];
        $presu = $_POST['presu'];
        $tam = $_POST['tam'];
        
        $query = "UPDATE zoologico SET nombre_zoologico='$nom_zoo', presupuesto='$presu', tamanio='$tam' WHERE id_zoologico=$id_zoo";
        mysqli_query($conn, $query);
        
        $_SESSION['message'] = "Actualizacion realizada de forma exitosa";
        $_SESSION['message_color'] = "warning";
        header("Location: zoologico.php");
    }

?>


<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_zoo.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nom_zoo" value="<?php echo $nom_zoo; ?>" class="form-control" placeholder="Actualizar nombre">
                    </div>
                    <div class="form-group">
                        <input type="number" min="0" name="presu" value="<?php echo $presu; ?>" class="form-control" placeholder="Actualizar presupuesto">
                    </div>
                    <div class="form-group">
                        <input type="number" min="0" name="tam" value="<?php echo $tam; ?>" class="form-control" placeholder="Actualizar tamaño">
                    </div>
                    <button class="btn btn-success" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>