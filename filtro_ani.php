             
<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>
               
               
            <div class="container p-4">
               <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Animal</th>
                            <th>Nombre Animal</th>
                            <th>Sexo</th>
                            <th>Especie</th>
                            <th>Zoologico</th>
                            <th>Origen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        if(isset($_POST['search'])){
                        $id_ani = $_POST['buscar'];
                            
                            
                        if($id_ani!=""){
                            
                            $query = "SELECT a.id_animal, a.nombre_animal, s.tipo_sexo, e.nombre_cientifico, z.nombre_zoologico, p.nombre_pais FROM animal a, sexo s, especie e, zoologico z, pais p WHERE a.fk_sexo=s.id_sexo and a.fk_especie=e.id_especie and a.fk_zoologico=z.id_zoologico and a.fk_origen=p.id_pais and a.id_animal LIKE '".$id_ani."%'";
                            $result_ani = mysqli_query($conn, $query);
                            
                            while($row=mysqli_fetch_array($result_ani)){ ?>
                                <tr>
                                    <td><?php echo $row['id_animal']?></td>
                                    <td><?php echo $row['nombre_animal']?></td>
                                    <td><?php echo $row['tipo_sexo']?></td>
                                    <td><?php echo $row['nombre_cientifico']?></td>
                                    <td><?php echo $row['nombre_zoologico']?></td>
                                    <td><?php echo $row['nombre_pais']?></td>
                                </tr>
                                
                                

                            <?php } }}?>
                    </tbody>  
                </table>   
            </div>
            </div>