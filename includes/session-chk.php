<?php

if(!isset($_SESSION['username'])){ //does $_SESSION username exist. If not then navigate back to login page

    header('location: login-verify-error-session.php?logged=denied');
    exit();

}


?>