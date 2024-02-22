<?php 
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $connect->query("delete from empleado where id_empleado = $id");
    if ($sql == true) { ?>
        <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "employee deleted successfully",
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
                            text: "error deleting employee",
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