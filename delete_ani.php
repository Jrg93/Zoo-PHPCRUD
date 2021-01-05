<?php

    include("db.php");

    /*Se crea la sentencia SQL para eliminar datos de la tabla animales*/
    if(isset($_GET['id'])){
        $id_animal = $_GET['id'];
        $query = "DELETE FROM animal WHERE id_animal=$id_animal";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            die("Error");
        }
        
        
        $_SESSION['message'] = 'Registro eliminado con exito';
        $_SESSION['message_color'] = 'danger';
        
        header("Location: animales.php");
        
        
        
    }

?>