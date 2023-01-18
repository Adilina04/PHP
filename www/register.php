<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/class/RegisterForm.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <div class="regis_div">
        <h1 class="regis_title">Register</h1>

        <?= show_error() ?>

        <form action="/actions/form_contact.php" method="post" class="regis_form">
            <div>
                <input type="text" id="fullname" name="fullname" required="required" placeholder="Votre nom complet*">
            </div>
            <div>
                <input type="email" id="email" name="email" required="required" placeholder="Email*">
            </div>
            <div>
                <input type="text" id="phone" name="phone" required="required" placeholder="Numero de Telephone*">
            </div>
            <div>
            <input type="password" id="password" name="password" required="required" placeholder="Mot de passe*">
            </div>
            <div>
            <input type="password" id="conf_password" name="conf_password" required="required" placeholder="Confirmer Mot de passe*">

            </div>
            <button name="subm_user" type="submit">Envoyer</button>
        </form>
    </div>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>