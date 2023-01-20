<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>
    <body>
        <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
        <section>
            
        <h2>Bienvenue sur</h2>
        <h1>Pocket Bank</h1>

        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            echo '<h3 style="background-color: green;">you are logged in<h3>';
        } else {
            echo '<h3 style="background-color: red;">you are not logged in<h3>';
        }
        ?>
        </section>

        <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
    </body>
</html>