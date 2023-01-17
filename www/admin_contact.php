<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$stmh = $db->prepare('SELECT * FROM contact_forms');
$stmh->execute();
$stmh->setFetchMode(PDO::FETCH_CLASS, 'ContactForm');;
// fetchAll = tableau de resultat
// fetch = 1 resultat
$forms = $stmh->fetchAll();
// $forms = [ ContactForm, ContactForm, ContactForm ]

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>

<?php 
foreach($forms as $form) { ?>
<p>
Email: <?= $form->email ?><br />
Date: <?= $form->getCreatedAt() ?><br />
</p>
<hr>
<?php
}
?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>