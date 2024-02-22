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

    <h4 class="text-center text-secondary" style="color:grey">EMPLOYEE LIST</h4>

    <?php 
        include "../model/connection.php";
        include "../controller/controller_modify_employee.php";
        include "../controller/controller_deleted_employee.php";
        $sql=$connect->query("SELECT 
        empleado.id_empleado,
        empleado.nombre,
        empleado.apellido,
        empleado.dni,
        empleado.cargo,
        cargo.nombre as 'nom_cargo' 
        FROM empleado
        INNER JOIN cargo ON empleado.cargo = cargo.id_cargo");
    ?>

    <a href="register_employee.php" class="btn btn-primary btn-rounded mb-3"><i class="fa-solid fa-plus"></i>&nbsp; Register</a><br><br>
    <table class="table table-bordered table-hover col-12" id="example">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NAMES</th>
        <th scope="col">SURNAMES</th>
        <th scope="col">POST</th> 
        <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
while ($data = $sql->fetch_object()) {
?>
    <tr>
        <td><?= $data->id_empleado ?></td>
        <td><?= $data->nombre ?></td>
        <td><?= $data->apellido ?></td>
        <td><?= $data->nom_cargo ?></td>
        <td style="position: relative; text-align: center;">
            <!-- Enlace para editar -->
            <a href="edit_user.php?id=<?= $data->id_empleado ?>" data-toggle="modal" data-target="#exampleModal<?= $data->id_empleado?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            <!-- Enlace para eliminar (como lo tienes actualmente) -->
            <a href="employees.php?id=<?= $data->id_empleado ?>" onclick="warning(event)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?= $data->id_empleado?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
            <h5 class="modal-title w-100" id="exampleModalLabel">Modify employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="" method="POST">
            <div hidden class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;ID" class="input input__text" name="txtId" value="<?= $data->id_empleado?>"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;Name" class="input input__text" name="txtName" value="<?= $data->nombre?>"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;Surnames" class="input input__text" name="txtSurnames" value="<?= $data->apellido ?>"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 ">
                <select name="txtPost" class="input input__select">
                    <?php 
                    $sql2=$connect->query("select * from cargo");
                    while ($datas2=$sql2->fetch_object()){ ?>
                        <option <?= $data->cargo==$datas2->id_cargo ? 'selected' : '' ?> value="<?= $datas2->id_cargo ?>"><?= $datas2->nombre ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="text-right">
                <a href="employees.php" class="btn btn-secondary btn-rounded">back</a>
                <button type="submit" value="ok" class="btn btn-primary btn-rounded" name="btnModify" style="margin: 12px;">Modify</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    </div>
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