<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql=$connect->query("delete from asistencia where id_asistencia=$id");
    if ($sql==true) {?>
        <script>
            $(function notification(){
                new PNotify({
                    title: "CORRECT",
                    type: "success",
                    text: "assistance removed successfully",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } else {?>
        <script>
            $(function notification(){
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "error when deleting",
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