<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_POST['depot'])){
        $amount = $_POST['amount'];
        if ($amount != '') {
            $depotform = $dbManager->insert('INSERT INTO depot(id_user,amount) VALUES(?, ?)',[$user_id, $amount]);
            $message = 'Votre dépôt a été effectué avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce dépôt.';
        }
    } else {
        $message = 'Veuillez entrer une amount valide.';
    } 
} else {
    header('location:login.php');
}
?>