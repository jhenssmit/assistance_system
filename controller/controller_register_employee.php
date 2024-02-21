<?php
if (!empty($_POST["btnRegister"])) {
    if (!empty($_POST["txtName"]) and !empty($_POST["txtSurnames"]) and !empty($_POST["txtDNI"]) and !empty($_POST["txtPost"])) {
        $name = $_POST["txtName"];
        $surname = $_POST["txtSurnames"];
        $DNI = $_POST["txtDNI"];
        $post = $_POST["txtPost"];

        $sql = $connect->query(" select count(*) as 'dni' from empleado where dni='$DNI'");
        if ($sql->fetch_object()->dni>0) {?>
            <script>
            $(function notification(){
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "The DNI <?= $DNI?> already exists",
                    styling: "bootstrap3"
                })
            })
        </script>
        <?php } else {
            $register = $connect->query("insert into empleado (nombre, apellido, dni, cargo) values ('$name','$surname','$DNI','$post')");
            if($register==true){?>
                <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "The employee has successfully registered",
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
                            text: "error registering employee",
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