<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'depot';
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

<body>
<link rel="stylesheet" href="../../src/style.css">
    <div>
        <h1>Dépôt</h1>
    </div>
    <div>
        <form action="depot.php" method="post">
            <div>
                <label for="amount">amount</label>
                <input type="int" name="amount" id="amount">
            </div>
            <div>
                <label for="id_users">id_users</label>
                <input type="int" name="id_users" id="id_users">
            </div>
            <div>
                <label for="id_devises">id_devises</label>
                <input type="int" name="id_devises" id="id_devises">
            </div>
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
  
</body>

</html>