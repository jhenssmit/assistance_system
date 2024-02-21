<?php
session_start();
session_destroy();
header("location:http://localhost/sis-asistencia/vista/login/login.php");

?>