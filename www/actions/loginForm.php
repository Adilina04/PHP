<?php

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('location:index.php')
} else {
    // User is not logged in
    if(ISSET($_POST['connexion'])){
        if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty('password')){
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $hashpassword = hash('sha256', $password);
            $loginform = $dbManager->select('SELECT * FROM users', [$email, $hashpassword], 'UserForm')
            if($loginform){
                $user_id = ('SELECT id FROM users WHERE mail='.$email.);
                $_SESSION['user_id'] = $user_id;
                if($_SESSION['user_id']){
                    $_SESSION['logged_in'] = true;
                    header("location:index.php");
                }
            }else{
                $loginerror = 'Email ou mot de passe invalide';
                }
        }else{
            $emptyfield = "All field are required";
        }
    }
}
?>