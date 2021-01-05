<?php

    include("db.php");

    if(isset($_POST['save'])){
        $nom_zoo = $_POST['nom_zoo'];
        $presu = $_POST['presu'];
        $tam = $_POST['tam'];
        $nom_ciudad = $_POST['nom_ciudad'];
        
        
        /*Se genera el insert a la tabla zoologico, haciendo uso de las variables que contienen los datos ingresados por el usuario.*/
        $query = "INSERT INTO zoologico(nombre_zoologico, presupuesto, tamanio, fk_ciudad) VALUES ('$nom_zoo', '$presu', '$tam', '$nom_ciudad')";
        $result = mysqli_query($conn, $query);
        
        /*En caso de que haya algun error en la consulta se terminara*/
        if(!$result){
            die("Error");
        }
        
        /*en caso de que no hayan problemas, se redirigira al index*/
        header("Location: zoologico.php");
        
        /*Se guarda el mensaje en la sesion y tambien un color, en este caso es el color "success*/
        $_SESSION["message"] = 'Informacion guardada con exito';
        $_SESSION["message_color"] = 'success';
        
        
        
    }

?>