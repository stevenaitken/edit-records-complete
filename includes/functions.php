<?php


function login_check()
{
    $password = $confirm_password = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password == $confirm_password) {
            echo $password;
            echo $confirm_password;
            echo "Password's match";

        }
    }

}

function login_check_direct(){
$password = $confirm_password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
      
        if($password == $confirm_password){
            header('Location: log_script.php'); // php redirect
        die();

        }
}
}



function login_check_direct_err_msg(){

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password == $confirm_password) {
            header('Location: log_script.php'); // php redirect
            die();

        } else {
            $error = "Passwords to do match";
        }
    }
      


}
?>