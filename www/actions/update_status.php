<?php

require_once __DIR__ . '/../../src/init.php';

$verifys = ['status', 'id'];

if (!isset($_POST[$verify])) {
    set_error_die('Empty ' . $verify, '/test_db.php');
}

$dbManager->update('contact_forms',['status' => $_POST['status'], 'id' => $_POST['id']]);

// ajoute response header pour rediriger utilisateur/navigateur
header('Location: /test_db.php');