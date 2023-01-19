<?php

require_once __DIR__ . '/../../src/init.php';

$smth = $db->prepare("UPDATE contact_forms SET status = 10 WHERE id = 2");
$stmh->execute();