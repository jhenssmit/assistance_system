<?php 

if (!empty($_POST["btnModify"])) {
   if (!empty($_POST["txtName"]) and !empty($_POST["txtSurnames"]) and !empty($_POST["txtUser"])) {
    $name = $_POST["txtName"];
    $surname = $_POST["txtSurnames"];
    $user = $_POST["txtUser"];
    $id=$_POST["txtId"];
    $sql = $connect->query(" select count(*) as 'total' from usuario where usuario='$user' and id_usuario!='$id'");
    if ($sql->fetch_object()->total>0) { ?>
         <script>
            $(function notification(){
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "The user <?= $user?> already exists",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } else {
        $modify=$connect->query(" update usuario set nombre='$name',apellido='$surname',usuario='$user' where id_usuario='$id'");
        if ($modify==true) { ?>
            <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "The user has been modified successfully",
                            styling: "bootstrap3"
                        })
                    })
                </script>
        <?php } else { ?>
            <script>
                    $(function notification(){
                        new PNotify({
                            title: "INCORRECT",
                            type: "error",
                            text: "error when modifying user",
                            styling: "bootstrap3"
                        })
                    })
                </script>
        <?php }
        
    }
    
   } else {?>
    <script>
            $(function notification(){
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "the fields are empty",
                    styling: "bootstrap3"
                })
            })
        </script>
   <?php } ?>
<script>
    setTimeout(()=>{
        window.history.replaceState(null, null, window.location.pathname);
    }, 0);
</script>
   
<?php } 


?>