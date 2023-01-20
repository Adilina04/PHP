<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'depot';
if (isset($_POST['depot'])){
    $amount = $_POST['amount'];
    $id_user = $_POST['id_user'];
if ($amount != '') {
        // Effectuer le dépôt
        // $req = $db->prepare('INSERT INTO depot(id_user,amount) WHERE id_user = ? AND amount = ?');
        // $req->execute([$id_user, $amount]);

        // Enregistrer la transaction dans la table transactions
        $req = $db->prepare('INSERT INTO depot(id_user,amount) VALUES(?, ?)');
        $req->execute([$id_user, $amount]);

            $message = 'Votre dépôt a été effectué avec succès.';
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
                <label for="id_user">id_user</label>
                <input type="int" name="id_user" id="id_user">
            </div>
            <div>
                <label for="amount">amount</label>
                <input type="int" name="amount" id="amount">
            </div>
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
  
</body>

</html>