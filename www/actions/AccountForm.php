<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

    
} else {
    header('location:login.php');
}


?>