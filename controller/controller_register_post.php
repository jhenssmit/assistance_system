<?php 
if (!empty($_POST["btnRegister"])) {
    if (!empty($_POST["txtName"])) {
        $name = $_POST["txtName"];
        $verifyName=$connect->query("select count(*) as 'total' from cargo where nombre = '$name'");
        if ($verifyName->fetch_object()->total > 0) { ?>
            <script>
            $(function notification(){
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "The post <?= $name?> already exists",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } else {
        $sql=$connect->query("insert into cargo(nombre) values ('$name')");
        if ($sql==true) { ?>
            <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "The post has successfully registered",
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
                            text: "error registering post",
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