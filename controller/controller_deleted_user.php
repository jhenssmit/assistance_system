<?php
if (!empty($_GET['id'])) {
    $id=$_GET['id'];
    $sql=$connect->query("delete from usuario where id_usuario='$id'");
    if ($sql == true) { ?>
       <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "user deleted successfully",
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
                            text: "error deleting user",
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