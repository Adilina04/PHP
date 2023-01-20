<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Admin panel';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

// assigner manuellement level de permission pour tests
$_SESSION['id_roles'] = 1000;

?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
<div>
    <h1>Admin panel</h1>
</div>

<?php
    $sql = $db->prepare('SELECT * FROM users');
    $sql->execute();
    $data = $sql->fetchAll();
    foreach($data as $user){
        if($dbManager->check_roles($user['id_roles'], 1)){
            echo 'Name: '.$user['fullname'].' <br>';
            echo 'Mail: '.$user['mail'].' <br>';
            echo 'Phone: ' . $user['phone'] .' <br>';
            echo 'Role: '.$user['id_roles'] .' <br>';
            echo '<hr>';
        }
    }


require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>

</body>