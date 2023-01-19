<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Register';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/class/RegisterForm.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <div class="regis_div">
        <h1 class="regis_title">Register</h1>

        <?= show_error() ?>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="regis_form">
            <div>
                <input type="text" id="fullname" name="fullname" required="required" placeholder="Votre nom complet*">
                <span class= "error-alert"><?php echo $err_Fullname ?></span>
            </div>
            <div>
                <input type="email" id="email" name="email" required="required" placeholder="Email*">
                <span class="error-alert"><?php echo $err_Email ?></span>
            </div>
            <div>
                <input type="text" id="phone" name="phone" required="required" placeholder="Numero de Telephone*">
                <span class="error-alert"><?php echo $err_Phone ?></span>
            </div>
            <div>
            <input type="password" id="password" name="password" required="required" placeholder="Mot de passe*">
            <span class="error-alert"><?php echo $err_Password ?></span>
            </div>
            <div>
            <input type="password" id="conf_password" name="conf_password" required="required" placeholder="Confirmer Mot de passe*">
            <span class="error-alert"><?php echo $err_Conf_Password ?></span>
            </div>
            <button name="subm_user" type="submit">Envoyer</button>
        </form>
    </div>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>