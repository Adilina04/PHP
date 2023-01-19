<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Manager';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
$_SESSION['id_roles'] = 200;

?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
<div>
    <h1>Manager verify</h1>
</div>



<div><h2>Users List:</h2>

    <?php
    echo        '<form action="/actions/update_status.php" method="post">';

        $sql = $db->prepare('SELECT * FROM users');
        $sql->execute();
        $data = $sql->fetchAll();
        foreach($data as $user){
            echo 'Name: '.$user['fullname'].' <br>';
            echo 'Mail: '.$user['mail'].' <br>';
            echo 'Phone: ' . $user['phone'] .' <br>';
            echo 'Role: '.$user['id_roles'] .' <br>';
            if($dbManager->check_roles($_SESSION['id_roles'], 200)){
                echo '<input type="checkbox" name="user[]" value="' . $user['id'] .'"><br>';
            }
            echo '<hr>';
        }

    echo '<br>';
    echo '<br>';

    if ($dbManager->check_roles($_SESSION['id_roles'], 200)) {
        echo '<input type="submit" name="accept-account-submit" value="Valider">';
    } else {
        echo "You don't have the permission to change roles! You shouldn't even be here!";
        echo "Your permission level is: " . $_SESSION['id_roles'] . ".";
    }
    echo        '</form>';

    echo '<br>';
    echo '<br>';
    echo '<hr>';
    echo '</div>';
    

    require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>


