<?php

require_once __DIR__ . '/../../src/init.php';

$verifys = ['fullname', 'phone', 'email'];

foreach($verifys as $verify) {
    if (!isset($_POST[$verify])) {
        set_error_die('Empty ' . $verify, '/contact.php');
    }
}

$message = "";
if (!empty($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    set_error_die('Bad email', '/contact.php');
}

// stock en BDD
$stmh = $db->prepare('INSERT INTO contact_forms(fullname, phone, email, message) VALUES(?, ?, ?, ?)');
$stmh->execute([
    $_POST['fullname'], $_POST['phone'], $_POST['email'], $_POST['message']
]);

// ajoute response header pour rediriger utilisateur/navigateur
header('Location: /contact.php');