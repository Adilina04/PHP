<?php
if (isset($_POST['depot'])){
    $amount = $_POST['amount'];
    $id_users = $_POST['id_users'];
    $id_devises = $_POST['id_devises'];
if ($amount != '') {
        // Effectuer le dépôt
        // $req = $db->prepare('INSERT INTO depot(id_users,amount) WHERE id_users = ? AND amount = ?');
        // $req->execute([$id_users, $amount]);

        // Enregistrer la transaction dans la table transactions
        $req = $db->prepare('INSERT INTO deposits(amount,id_users,id_devises) VALUES(?, ?, ?)');
        $req->execute([$amount,$id_users,$id_devises]);

            $message = 'Votre dépôt a été effectué avec succès.';
            echo $message;
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce dépôt.';
        }
    } else {
        $message = 'Veuillez entrer une amount valide.';
    }
?>