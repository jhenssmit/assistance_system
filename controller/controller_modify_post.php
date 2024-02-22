<?php
if (!empty($_POST["btnModify"])) {
    if (!empty($_POST["txtId"]) and !empty($_POST["txtName"]) ) {
        $id = $_POST["txtId"];
        $name = $_POST["txtName"];
        $verifyName= $connect->query("select count(*) as 'total' from cargo where nombre='$name' and id_cargo=$id");
        if ($verifyName->fetch_object()->total > 0) { ?>
            <script>
                    $(function notification(){
                        new PNotify({
                            title: "INCORRECT",
                            type: "error",
                            text: "The post <?= $name ?> already exists",
                            styling: "bootstrap3"
                        })
                    })
                </script>
        <?php } else { 
            $sql=$connect->query("update cargo set nombre = '$name' where id_cargo=$id");
            if ($sql==true) { ?>
                <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "The post has been modified successfully",
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
            
         }
        
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