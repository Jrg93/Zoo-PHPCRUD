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
                    <form action="save_ani.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nom_ani" class="form-control" placeholder="Nombre Animal" autofocus>
                        </div>
                        
                        <div class="form-group">
                          <!--Se genera una consula SQL para obtener los datos de la tabla "sexo", haciendo uso de un while se recorren los registros, con echo mostraremos los valores de los option, en este caso el valor contenido en row. -->
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
                          <!--Se genera una consula SQL para obtener los datos de la tabla "especie", haciendo uso de un while se recorren los registros, con echo mostraremos los valores de los option, en este caso el valor contenido en row. -->
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
                          <!--Se genera una consula SQL para obtener los datos de la tabla "familia", haciendo uso de un while se recorren los registros, con echo mostraremos los valores de los option, en este caso el valor contenido en row. -->
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
                          <!--Se genera una consula SQL para obtener los datos de la tabla "familia", haciendo uso de un while se recorren los registros, con echo mostraremos los valores de los option, en este caso el valor contenido en row. -->
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
                        
                        
                        
                        <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                    </form>
                </div>
            </div>
            
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Sexo</th>
                            <th>Especie</th>
                            <th>Zoologico</th>
                            <th>Origen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       <!--Consulta para obtener los datos de la tabla animal, se hace uso de 5 tablas, con la finalidad de obtener el nombre de las categorias y no el id-->
                        <?php
                            $query = "SELECT a.id_animal, a.nombre_animal, s.tipo_sexo, e.nombre_cientifico, z.nombre_zoologico, p.nombre_pais FROM animal a, sexo s, especie e, zoologico z, pais p WHERE a.fk_sexo=s.id_sexo and a.fk_especie=e.id_especie and a.fk_zoologico=z.id_zoologico and a.fk_origen=p.id_pais";
                            $result_ani = mysqli_query($conn, $query);
                            
                            while($row=mysqli_fetch_array($result_ani)){ ?>
                                <tr>
                                    <td><?php echo $row['id_animal']?></td>
                                    <td><?php echo $row['nombre_animal']?></td>
                                    <td><?php echo $row['tipo_sexo']?></td>
                                    <td><?php echo $row['nombre_cientifico']?></td>
                                    <td><?php echo $row['nombre_zoologico']?></td>
                                    <td><?php echo $row['nombre_pais']?></td>
                                    <td>
                                       <!--en el href se agrega el id atraves de codigo php, de esta manera podremos realizar los update y delete.-->
                                        <a href="edit_ani.php?id=<?php echo $row['id_animal']?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="delete_ani.php?id=<?php echo $row['id_animal']?>" class="btn btn-danger">
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