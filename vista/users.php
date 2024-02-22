<?php
session_start();
if(empty($_SESSION['name']) and empty($_SESSION["lastName"])){
    header('location:login/login.php');
}

?>

<style>
    ul li:nth-child(2) .activo{
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

    <h4 class="text-center text-secondary" style="color:grey">USER LIST</h4>

    <?php 
        include "../model/connection.php";
        include "../controller/controller_modify_user.php";
        include "../controller/controller_deleted_user.php";
        $sql=$connect->query("SELECT * FROM usuario");
    ?>

    <a href="register_user.php" class="btn btn-primary btn-rounded mb-3"><i class="fa-solid fa-plus"></i>&nbsp; Register</a><br><br>
    <table class="table table-bordered table-hover col-12" id="example">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NAMES</th>
        <th scope="col">SURNAMES</th>
        <th scope="col">USER</th> 
        <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
while ($data = $sql->fetch_object()) {
?>
    <tr>
        <td><?= $data->id_usuario ?></td>
        <td><?= $data->nombre ?></td>
        <td><?= $data->apellido ?></td>
        <td><?= $data->usuario ?></td>
        <td style="position: relative; text-align: center;">
            <!-- Enlace para editar -->
            <a href="edit_user.php?id=<?= $data->id_usuario ?>" data-toggle="modal" data-target="#exampleModal<?= $data->id_usuario?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            <!-- Enlace para eliminar (como lo tienes actualmente) -->
            <a href="users.php?id=<?= $data->id_usuario ?>" onclick="warning(event)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?= $data->id_usuario?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
            <h5 class="modal-title w-100" id="exampleModalLabel">Modify user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="" method="POST">
            <div hidden class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;ID" class="input input__text" name="txtId" value="<?= $data->id_usuario?>"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;Name" class="input input__text" name="txtName" value="<?= $data->nombre?>"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;Surnames" class="input input__text" name="txtSurnames" value="<?= $data->apellido ?>"><br><br>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" placeholder="&nbsp;&nbsp;&nbsp;User" class="input input__text" name="txtUser" value="<?= $data->usuario ?>"><br><br>
            </div>
            <div class="text-right">
                <a href="users.php" class="btn btn-secondary btn-rounded">back</a>
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