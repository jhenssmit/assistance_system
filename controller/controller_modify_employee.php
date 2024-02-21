<?php 
if (!empty($_POST["btnModify"])) {
    if (!empty($_POST["txtId"]) and !empty($_POST["txtName"]) and !empty($_POST["txtSurnames"]) and !empty($_POST["txtChange"])) {
        $id=$_POST["txtId"];
        $name=$_POST["txtName"];
        $surname=$_POST["txtSurnames"];
        $change=$_POST["txtChange"];
        $sql=$connect->query("update empleado set nombre='$name', apellido='$surname', cargo=$change where id_empleado=$id");
        if ($sql==true) { ?>
            <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "The employee has been modified successfully",
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
                            text: "error when modifying employee",
                            styling: "bootstrap3"
                        })
                    })
                </script>
        <?php }
        
    } else { ?>
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