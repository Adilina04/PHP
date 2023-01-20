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
                foreach ($loginform as $row) {

                    $_SESSION['id'] = $row->id;
                    $_SESSION['name'] = $row->fullname;
                    $_SESSION['email'] = $row->mail;
                    $_SESSION['phone'] = $row->phone;
                    $_SESSION['birthday'] = $row->birthday;
                    $_SESSION['role'] = $row->id_roles;

                }
                if ($_SESSION['id'] && $_SESSION['role'] != 0) {
                $_SESSION['logged_in'] = true;
                session_regenerate_id(true);
                header('location:myaccount.php');
                } else {
                    echo "<h1 style='background-color: red'>You're banned bozo</h1>";
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
