<?php 

if (!empty($_POST["btnRegister"])) {
    if (!empty($_POST["txtName"]) and !empty($_POST["txtSurnames"]) and !empty($_POST["txtUser"]) and !empty($_POST["txtPassword"])) {
        $name = $_POST["txtName"];
        $surname = $_POST["txtSurnames"];
        $user = $_POST["txtUser"];
        $password = md5($_POST["txtPassword"]);
        
        $sql = $connect->query(" select count(*) as 'total' from usuario where usuario='$user'");
        if ($sql->fetch_object()->total>0) {?>
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
            $register = $connect->query("insert into usuario (nombre, apellido, usuario, password) values ('$name','$surname','$user','$password')");
            if($register==true){?>
                <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "The user has successfully registered",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php }else{ ?>
                <script>
                    $(function notification(){
                        new PNotify({
                            title: "INCORRECT",
                            type: "error",
                            text: "error registering user",
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