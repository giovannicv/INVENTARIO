<!-- <session es para ineciar secion antes de entrar a la pagina> -->
<?php require "./inc/session_start.php"; ?>
<!DOCTYPE html>
<html>
<!--encabezado de la pagina que aparece en todas las paginas-->
    <head>
        <?php include "./inc/head.php"; ?>
    </head>
    <body>
        <?php
// para que logeen
            if(!isset($_GET['vista']) || $_GET['vista']==""){
                $_GET['vista']="login";
            }

// si en valor coincide con la misma variable,muestra el valor ERROR 404
            if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){

                /*== Cerrar sesion ==*/
                if(!isset($_SESSION['id']) && $_SESSION['id']=="" && !isset($_SESSION['usuario']) && $_SESSION['usuario']==""){
                    if(headers_sent()){
                        echo "<script> window.location.href='index.php?vista=login'; </script>";
                    }else{
                        header("Location: index.php?vista=login");
                    }
                }

                include "./inc/navbar.php";

                include "./vistas/".$_GET['vista'].".php";

                include "./inc/script.php";

            }else{
                if($_GET['vista']=="login"){
                    include "./vistas/login.php";
                }else{
                    include "./vistas/404.php";
                }
            }
        ?>
    </body>
    
</html>