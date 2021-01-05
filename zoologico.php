<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>

    
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
               
               <!--se valida la existencia del mensaje y en caso de existir se usara un alerts con boostrap-->
               <?php if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?= $_SESSION['message_color'];?> alert-dismissible fade show" role="alert">
                     <?= $_SESSION['message'] ?>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                     </div>
               <?php session_unset(); } ?>
               
               
                <div class="card card-body">
                    <form action="save_zoo.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nom_zoo" class="form-control" placeholder="Nombre Zoologico" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="number" min="0" name="presu" class="form-control" placeholder="Presupuesto">
                        </div>
                        <div class="form-group">
                            <input type="number" min="0" name="tam" class="form-control" placeholder="Tamaño">
                        </div>
                        
                        <div class="form-group">
                          <!--Se genera una consula SQL para obtener los datos de la tabla "ciudad", haciendo uso de un while se recorren los registros, con echo mostraremos los valores de los option, en este caso el valor contenido en row. -->
                           <select name="nom_ciudad" class="form-control">
                           
                               <?php
                                    $sql="SELECT id_ciudad, nombre_ciudad, fk_pais FROM ciudad ";
                                    $rec= mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($rec))
                                    {
                                        echo "<option value='".$row['id_ciudad']."'>";
                                        echo $row['nombre_ciudad'];
                                        echo "</option>";
                                    }
                               ?>
                           
                           </select>
                        </div>
                        
                        <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                    </form>
                </div>
            </div>
            
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Zoologico</th>
                            <th>Nombre Zoologico</th>
                            <th>Presupuesto</th>
                            <th>Tamaño</th>
                            <th>Ciudad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       <!--Consulta para obtener los datos de la tabla zoologico, se hace uso de 2 tablas, zoo y ciudad con la finalidad de obtener el nombre de la ciudad y no el id que nos entrega la tabla zoo-->
                        <?php
                            $query = "SELECT id_zoologico, nombre_zoologico, presupuesto, tamanio, nombre_ciudad FROM zoologico z, ciudad c WHERE c.id_ciudad=z.fk_ciudad";
                            $result_zoo = mysqli_query($conn, $query);
                            
                            while($row=mysqli_fetch_array($result_zoo)){ ?>
                                <tr>
                                    <td><?php echo $row['id_zoologico']?></td>
                                    <td><?php echo $row['nombre_zoologico']?></td>
                                    <td><?php echo $row['presupuesto']?></td>
                                    <td><?php echo $row['tamanio']?></td>
                                    <td><?php echo $row['nombre_ciudad']?></td>
                                    <td>
                                       <!--en el href se agrega el id atraves de codigo php, de esta manera podremos realizar los update y delete.-->
                                        <a href="edit_zoo.php?id=<?php echo $row['id_zoologico']?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="delete_zoo.php?id=<?php echo $row['id_zoologico']?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    
<?php
    include("includes/footer.php");
?>
