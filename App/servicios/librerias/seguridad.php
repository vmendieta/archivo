<?php
session_start();
if (!isset($_SESSION['usu_codigo'])){
    header('location: login.php');
}



?>