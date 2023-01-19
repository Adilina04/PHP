<?php
require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Login';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

require_once __DIR__ . '/../src/templates/partials/header.php';
?>

        <section class="regis_div">
            <h1 class="regis_title">CONNEXION</h2>
            <section class="error">
            <?php
            if (isset($emptyfield)) {
                echo '<div class="error-alerts alerts-success">' .
                    $emptyfield .
                    '</div>';
            }
            if (isset($loginerror)) {
                echo '<div class="error-alerts alerts-success">' .
                    $loginerror .
                    '</div>';
            }
            ?>
            </section>
            <form method="post" class="regis_form">
                <div>
                    <input class="zone" type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Email" required>
                </div>
                <div>
                    <input class="zone" type="password" 
                        name="password" 
                        id="pass" 
                        placeholder="Mot de passe"
                        autocomplete="current-password"
                        minlength="8"
                        maxlength="16"
                        required>
                </div>
                <div class="align">
                    <input class='button' type="submit" value="connexion" name="connexion" class="inpbutton"> <a href="register.php" class="reglink">Inscription</a>
                </div>
            </form>
        </section>
        <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
    </body>
</html>

