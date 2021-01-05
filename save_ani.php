<?php

    include("db.php");

    if(isset($_POST['save'])){
        $nom_ani = $_POST['nom_ani'];
        $sexo = $_POST['sexo'];
        $especie = $_POST['especie'];
        $zoo = $_POST['zoologico'];
        $pais = $_POST['pais'];
        
        
        /*Se genera el insert a la tabla animal, haciendo uso de las variables que contienen los datos ingresados por el usuario.*/
        $query = "INSERT INTO animal(nombre_animal, fk_sexo, fk_especie, fk_zoologico, fk_origen) VALUES ('$nom_ani', '$sexo', '$especie', '$zoo', '$pais')";
        $result = mysqli_query($conn, $query);
        
        /*En caso de que haya algun error en la consulta se terminara*/
        if(!$result){
            die("Error");
        }
        
        /*en caso de que no hayan problemas, se redirigira al index*/
        header("Location: animales.php");
        
        /*Se guarda el mensaje en la sesion y tambien un color, en este caso es el color "success*/
        $_SESSION["message"] = 'Informacion guardada con exito';
        $_SESSION["message_color"] = 'success';
        
        
        
    }

?>