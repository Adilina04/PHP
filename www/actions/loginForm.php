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
                foreach($loginform as $row){
                    $_SESSION['user_id'] = $row->id; 
                    $_SESSION['fullname'] = $row->fullname;
                    $_SESSION['email'] = $row->mail;
                    $_SESSION['phone'] = $row->phone;
                    $_SESSION['iban'] = $row->iban;
                    $_SESSION['id_roles'] = $row->id_roles;
                    $_SESSION['birthday'] = $row->birthday;
                }
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
