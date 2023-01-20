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
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>

</body>

</html>