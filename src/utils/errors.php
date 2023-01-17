<?php 

function set_error_die($message, $url) {
    $_SESSION['error_message'] = $message;
    header('Location: '.$url);
    die();
}

function show_error() {
    if (isset($_SESSION['error_message'])) {
        $htmlError = '<p class="error-alert">'.$_SESSION['error_message'].'</p>';
        unset($_SESSION['error_message']);
        return $htmlError;
    }
}