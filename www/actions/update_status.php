<?php

require_once __DIR__ . '/../../src/init.php';

if (isset($_POST['accept-account-submit'])) {
    // get only checked checkboxes in the form
    $users = $_POST['user'];

    foreach ($users as $user) {
        // update the role of the users
        $userId = intval($user);
        $dbManager->update('users', ['id' => $userId, 'id_roles' => 10]);

    }

}

if (isset($_POST['admin-promote-submit'])) {
    // get only checked checkboxes in the form
    $users = $_POST['user'];

    foreach ($users as $user) {
        // update the role of the users
        $userId = intval($user);
        $dbManager->update('users', ['id' => $userId, 'id_roles' => 200]);

    }

}

if (isset($_POST['admin-demote-submit'])) {
    // get only checked checkboxes in the form
    $users = $_POST['user'];

    foreach ($users as $user) {
        // update the role of the users
        $userId = intval($user);
        $dbManager->update('users', ['id' => $userId, 'id_roles' => 10]);

    }

}

if (isset($_POST['ban-account-submit'])) {
    // get only checked checkboxes in the form
    $users = $_POST['user'];

    foreach ($users as $user) {
        // update the role of the users
        $userId = intval($user);
        $dbManager->update('users', ['id' => $userId, 'id_roles' => 0]);

    }

}

header('Location: /manager.php');