<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

    if(isset($_POST['logout'])){
        echo 'test';
        session_destroy();
        $_SESSION['logged_in'] = false;
        header('location:index.php');
    }
} else {
    header('location:login.php');
}


?>