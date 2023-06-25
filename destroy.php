<?php
session_start();
if(isset($_SESSION['role'])){
    session_destroy();
    echo "<script> location.href ='/'; </script>";
}
?>