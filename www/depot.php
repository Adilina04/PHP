<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'depot';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/actions/depotForm.php';
require_once __DIR__ . '/../src/templates/partials/header.php';
?>

<body>
<link rel="stylesheet" href="../../src/style.css">
    <div>
        <h1>Dépôt</h1>
    </div>
    <div>
        <form action="depot.php" method="post">
            <div>
                <label for="amount">amount</label>
                <input type="int" name="amount" id="amount">
            </div>
            <div>
                <label for="id_users">id_users</label>
                <input type="int" name="id_users" id="id_users">
            </div>
            <div>
                <label for="id_devises">id_devises</label>
                <input type="int" name="id_devises" id="id_devises">
            </div>
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>

</body>

</html>