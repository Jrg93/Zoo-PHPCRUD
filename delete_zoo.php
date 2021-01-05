<?php

    include("db.php");

    /*Se crea la sentencia SQL para eliminar datos de la tabla zoologico*/
    if(isset($_GET['id'])){
        $id_zoologico = $_GET['id'];
        $query = "DELETE FROM zoologico WHERE id_zoologico=$id_zoologico";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            die("Error");
        }
        
        
        $_SESSION['message'] = 'Registro eliminado con exito';
        $_SESSION['message_color'] = 'danger';
        
        header("Location: zoologico.php");
        
        
        
    }

?>