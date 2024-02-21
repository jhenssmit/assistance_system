<?php
session_start();
if(empty($_SESSION['name']) and empty($_SESSION["lastName"])){
    header('location:login/login.php');
}

?>

<style>
    ul li:nth-child(3) .activo{
        background: rgb(11, 150, 214) !important;
    }
</style>


<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<link rel="stylesheet" href="public/styles/styles.css">
<div class="page-content">

    <h4 class="text-center text-secondary" style="color:grey">EMPLOYEE REGISTRATION</h4>

    <?php 
        include "../model/connection.php";
        include "../controller/controller_register_employee.php";
    ?>

    <div class="row">
        <form action="" method="POST">
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;Name" class="input input__text" name="txtName"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;Surnames" class="input input__text" name="txtSurnames"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;DNI" class="input input__text" name="txtDNI" maxlength="8">
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <select name="txtPost" class="input input__select">
                    <option value="">Select...</option>
                    <?php 
                    $sql=$connect->query("select * from cargo");
                    while($datos=$sql->fetch_object()){?>
                        <option value="<?= $datos->id_cargo ?>"><?= $datos->nombre?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="text-right">
                <a href="employees.php" class="btn btn-secondary btn-rounded">back</a>
                <button type="submit" value="ok" class="btn btn-primary btn-rounded" name="btnRegister" style="margin: 12px;">Register</button>
            </div>
        </form>
    </div>


</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>