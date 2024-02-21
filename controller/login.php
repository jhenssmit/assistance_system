<?php

session_start();

if (!empty($_POST["btnEnter"])) {
    if (!empty($_POST["user"]) and !empty($_POST["password"])) {
        $user = $_POST["user"];
        $password = md5($_POST["password"]);
        $sql = $connect->query("select * from usuario where usuario='$user' and password='$password'");
        if ($date=$sql->fetch_object()) {
            $_SESSION["name"]=$date->nombre;
            $_SESSION["lastName"]=$date->apellido;
            header("location:../inicio.php");
        } else {
            echo "<div class='alert alert-danger'>Username does not exist</div>";
        }
        
    } else {
        echo "<div class='alert alert-danger'>The fields are empty</div>";
    }
    
}
?>