<?php
session_start();
if(empty($_SESSION['name']) and empty($_SESSION["lastName"])){
    header('location:login/login.php');
}

?>

<style>
    ul li:nth-child(1) .activo{
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

    <h4 class="text-center text-secondary" style="color:grey">EMPLOYEE ASSISTANCE</h4>

    <?php 
        include "../model/connection.php";
        include "../controller/controller_deleted_assistance.php";
        $sql=$connect->query("SELECT
        asistencia.id_asistencia,
        asistencia.id_empleado,
        asistencia.entrada,
        asistencia.salida,
        empleado.id_empleado,
        empleado.nombre as 'nom_employee',
        empleado.apellido,
        empleado.dni,
        empleado.cargo,
        cargo.id_cargo,
        cargo.nombre as 'nom_position'
        FROM
        asistencia
        INNER JOIN empleado on asistencia.id_empleado = empleado.id_empleado
        INNER JOIN cargo on empleado.cargo = cargo.id_cargo
        ");
    ?>

    <table class="table table-bordered table-hover col-12" id="example">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Employee</th>
        <th scope="col">DNI</th>
        <th scope="col">Position</th>
        <th scope="col">Enter</th>
        <th scope="col">Exit</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($data = $sql->fetch_object()) {
        ?>
            <tr>
                <td><?= $data->id_asistencia ?></td>
                <td><?= $data->nom_employee . " " . $data->apellido ?></td>
                <td><?= $data->dni ?></td>
                <td><?= $data->nom_position ?></td>
                <td><?= $data->entrada ?></td>
                <td><?= $data->salida ?></td> 
                <td>
                <!-- Enlace centrado en la celda con espacios -->
                <a href="inicio.php?id=<?= $data->id_asistencia?>" onclick="warning(event)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>


</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>