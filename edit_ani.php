<?php

    include("db.php");


    /*SE OBITNEN LOS DATOS PARA LLENAR LOS CAMPOS DEL EDIT (EN ANIMALES SOLO FUNCIONA CON NOMBRE ANIMAL, DEBIDO A QUE ES EL UNICO CAMPO QUE NO DEPENDE DE OTRA TABLA, EL ID TAMPOCO PERO NO QUISE DEJAR QUE SE EDITARA LA PRIMARY KEY)*/
    if(isset($_GET['id'])){
        $id_animal = $_GET['id'];
        $query = "SELECT nombre_animal, fk_sexo, fk_especie, fk_zoologico, fk_origen FROM animal WHERE id_animal=$id_animal";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $nom_ani = $row['nombre_animal'];
            $sexo = $row['fk_sexo'];
            $especie = $row['fk_especie'];
            $zoo = $row['fk_zoologico'];
            $pais = $row['fk_origen'];
        }
    }

    /*Se capturan los datos provenientes del propio php y se utilizan para realizar el update*/
    if(isset($_POST['update'])){
        $id_ani = $_GET['id'];
        $nom_ani = $_POST['nom_ani'];
        $sexo = $_POST['sexo'];
        $especie = $_POST['especie'];
        $zoo = $_POST['zoologico'];
        $pais = $_POST['pais'];
        
        $query = "UPDATE animal SET nombre_animal='$nom_ani', fk_sexo='$sexo', fk_especie='$especie', fk_zoologico='$zoo', fk_origen='$pais' WHERE id_animal=$id_ani";
        mysqli_query($conn, $query);
        
        $_SESSION['message'] = "Actualizacion realizada de forma exitosa";
        $_SESSION['message_color'] = "warning";
        header("Location: animales.php");
    }

?>


<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_ani.php?id=<?php echo $_GET['id']; ?>" method="POST">
                  <div class="form-group">
                        <input type="text" name="nom_ani" value="<?php echo $nom_ani; ?>" class="form-control" placeholder="Actualizar nombre">
                    </div>
                   <div class="form-group">
                    <select name="sexo" class="form-control">
                               <?php
                                    $sql="SELECT id_sexo, tipo_sexo FROM sexo ";
                                    $rec= mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($rec))
                                    {
                                        echo "<option value='".$row['id_sexo']."'>";
                                        echo $row['tipo_sexo'];
                                        echo "</option>";
                                    }
                               ?>
                           </select>
                        </div>
                       <div class="form-group">
                           <select name="especie" class="form-control">
                           
                               <?php
                                    $sql="SELECT id_especie, nombre_vulgar FROM especie ";
                                    $rec= mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($rec))
                                    {
                                        echo "<option value='".$row['id_especie']."'>";
                                        echo $row['nombre_vulgar'];
                                        echo "</option>";
                                    }
                               ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <select name="zoologico" class="form-control">
                               <?php
                                    $sql="SELECT id_zoologico, nombre_zoologico FROM zoologico";
                                    $rec= mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($rec))
                                    {
                                        echo "<option value='".$row['id_zoologico']."'>";
                                        echo $row['nombre_zoologico'];
                                        echo "</option>";
                                    }
                               ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <select name="pais" class="form-control">
                               <?php
                                    $sql="SELECT id_pais, nombre_pais FROM pais";
                                    $rec= mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($rec))
                                    {
                                        echo "<option value='".$row['id_pais']."'>";
                                        echo $row['nombre_pais'];
                                        echo "</option>";
                                    }
                               ?>
                           </select>
                        </div>
                    <button class="btn btn-success" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>