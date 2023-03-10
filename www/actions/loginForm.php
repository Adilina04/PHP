<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('location:index.php');
} else {
    // User is not logged in
    if (isset($_POST['connexion'])) {
        if (
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            !empty($_POST['email']) &&
            !empty('password')
        ) {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $hashpassword = hash('sha256', $password);
            $loginform = $dbManager->select(
                'SELECT * FROM users WHERE mail = ? AND password = ?',
                [$email, $hashpassword],
                'UserForm'
            );

            if ($loginform) {
                $user_id = $dbManager->select(
                    'SELECT id FROM users WHERE mail=?',
                    [$email],
                    'UserForm'
                );
                $id_roles = $dbManager->select(
                    'SELECT id_roles FROM users WHERE mail=?',
                    [$email],
                    'UserForm'
                );
                $user_name = $dbManager->select(
                    'SELECT fullname FROM users WHERE mail=?',
                    [$email],
                    'UserForm'
                );
                $_SESSION['user_id'] = $user_id;
                $_SESSION['id_roles'] = $id_roles;
                $_SESSION['fullname'] = $user_name;
                if ($_SESSION['user_id']) {
                    $_SESSION['logged_in'] = true;
                    session_regenerate_id(true);
                    header('location:myaccount.php');
                }
            } else {
                $loginerror = 'Email ou mot de passe invalide';
            }
        } else {
            $emptyfield = 'All field are required';
        }
    }
}
?>
