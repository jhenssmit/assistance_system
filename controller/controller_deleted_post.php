<?php 
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql=$connect->query("delete from cargo where id_cargo=$id");
    if ($sql==true) {?>
        <script>
                    $(function notification(){
                        new PNotify({
                            title: "CORRECT",
                            type: "success",
                            text: "post deleted successfully",
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
                            text: "error deleting post",
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