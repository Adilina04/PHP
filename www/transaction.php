<?php
require_once __DIR__ . '/../src/init.php';
$page_title = 'transaction';

$page_title = 'transactions';

if (isset($_POST['transactions'])){
    $amount = $_POST['amount'];
    $emitter = $_POST['emitter'];
    $receiver = $_POST['receiver'];

if ($amount != '') {
        // Effectuer le dépôt
        // $req = $db->prepare('INSERT INTO depot(id_user,amount) WHERE id_user = ? AND amount = ?');
        // $req->execute([$id_user, $amount]);

        // Enregistrer la transactionss dans la table transactionss
        $req = $db->prepare('INSERT INTO transactions (emitter, receiver, amount) VALUES(?, ?, ?)');
        $req->execute([$emitter, $receiver, $amount]);

            $message = 'Votre transactions a été effectuée avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer cette transactions.';
        }
    } else {
        $message = 'Veuillez entrer une amount valide.';
    }
?>
<body>
<link rel="stylesheet" href="../../src/style.css">
    <div>
        <h1>Transaction</h1>
    </div>
    <div>
        <form action="transaction.php" method="post">
        <div>
                <label for="dona">emitter</label>
                <input type="int" name="emitter" id="emitter">
            </div>
            <div>
                <label for="recev">receiver</label>
                <input type="int" name="receiver" id="receiver">
            </div>
            <div>
                <label for="prenom">amount</label>
                <input type="int" name="amount" id="amount">
            </div>
                <button type="submit" name="transactions">Transférer</button>
            </div>
        </form>
    </div>
    <div>
        <p><?= $message ?? '' ?></p>

    </div>
    <div>
        <button><a href="index.php">Retour</a></button>
    </div>
    <div>
        <button><a href="depot.php">Dépôt</a></button>
    </div>
    <div>
        <button><a href="retrait.php">Retrait</a></button>
    </div>
    <div>
        <button><a href="transaction.php">Transactions</a></button>
    </div>
    <?php include __DIR__ . '/../src/footer.php'; ?>

</body>

</html>