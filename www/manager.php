<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Manager';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

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

    if($dbManager->check_roles($_SESSION['id_roles'], 1000)){
        echo '<input type="submit" name="admin-promote-submit" value="Promouvoir"><br>';
        echo '<input type="submit" name="admin-demote-submit" value="Destituer"><br>';
        echo '<input type="submit" name="accept-account-submit" value="Accepter"><br>';
        echo '<input type="submit" name="ban-account-submit" value="Bannir"><br>';
    }
    else if ($dbManager->check_roles($_SESSION['id_roles'], 200)) {
        echo '<input type="submit" name="accept-account-submit" value="Accepter"><br>';
        echo '<input type="submit" name="ban-account-submit" value="Bannir"><br>';
    } else {
        echo "You don't have the permission level to change roles! You shouldn't even be here!";
    }
    var_dump($_SESSION['fullname']);
    echo '<br>';
    var_dump($_SESSION['id_roles']);
    echo '<br>';
    var_dump($_SESSION['id']);
    echo '<br>';

    echo "<br>You are logged in as: " . $_SESSION['fullname'] . ".";
    echo "<br>Your permission level is: " . $_SESSION['id_roles'] . ".";
    echo        '</form>';

    echo '<br>';
    echo '<br>';
    echo '<hr>';

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        echo '<h3 style="background-color: green;">you are logged in<h3>';
    } else {
        echo '<h3 style="background-color: red;">you are not logged in<h3>';
    }

    echo '</div>';
    

    require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>


