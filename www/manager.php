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

<?php

echo '<div><h2>Users List:</h2>';
$sql = $db->prepare('SELECT * FROM users');
$sql->execute();
$data = $sql->fetchAll();
foreach($data as $row){
    echo 'Name: '.$row['fullname'].' <br>';
    echo 'Mail: '.$row['mail'].' <br>';
    echo 'Phone: ' . $row['phone'] .' <br>';
    echo 'Role: '.$row['id_roles'] .' <br>';
    echo '<hr>';
}
echo '<br><br><form action="/actions/update_status.php" method="post">
        <div>
            <label for="id">ID utilisateur à modifier</label>
            <input type="number" id="id" name="id" required="required">
        </div>
        <div>
            <label for="status">Nouveau status (0, 1, 10, 1000)</label>
            <input type="number" id="status" name="status" required="required">
        </div>
        <button type="submit">Submit</button>
        </form>';
echo '</div><br><br><hr>';

require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>


