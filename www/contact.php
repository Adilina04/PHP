<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/templates/partials/header.php';

?>
<body>
<div>
    <h1>Contact</h1>

    <?= show_error(); ?>

    <form action="/actions/form_contact.php" method="post">
        <div>
            <label for="fullname">Votre nom complet</label>
            <input type="text" id="fullname" name="fullname" required="required">
        </div>
        <div>
            <label for="phone">Numero de Telephone</label>
            <input type="text" id="phone" name="phone" required="required">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required="required">
        </div>
        <div>
            <label for="message">Votre message</label>
            <textarea name="message" id="textarea" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
</div>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>