<?php
    function checkSession(){
        if (isset($_SESSION["Pnr"]) && !empty($_SESSION["Pnr"])) {
            // Do somthing
        } else {
            header('Location:../index.php');
        }
    }
?>