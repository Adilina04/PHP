<?php
require_once __DIR__ . '/../src/init.php';
$page_title = 'retrait';

if (isset($_POST['retrait'])){
    $amount = $_POST['amount'];
    $id_user = $_POST['id_user'];
if ($amount != '') {
        // Effectuer le retrait
        // $req = $db->prepare('INSERT INTO retrait(id_user,amount) WHERE id_user = ? AND amount = ?');
        // $req->execute([$id_user, $amount]);

        // Enregistrer la transaction dans la table tnsactions
        $req = $db->prepare('INSERT INTO retrait(id_user,amount) VALUES(?, ?)');
        $req->execute([$id_user, $amount]);

            $message = 'Votre retrait a été effectué avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce retrait.';
        }
    } else {
        $message = 'Veuillez entrer une amount valide.';
    }

    function update(string $tableName, array $data) 
        $sql = 'UPDATE '.$tableName.' SET ';
        foreach($data as $clef => $value){
            if ($clef != 'id'){
                $sql = $sql.$clef.'=:'.$clef.', ';
            }
        }
        $sql = substr($sql,0,-2);
        var_dump($sql);
        $req = $this->db->prepare($sql.' WHERE id=:id');
        $req->execute($data);

?>
<body>
<link rel="stylesheet" href="../../src/style.css">
    <div>
        <h1>Retrait</h1>
    </div>
    <div>
        <form action="retrait.php" method="post">
            <div>
                <label for="id_user">id_user</label>
                <input type="int" name="id_user" id="id_user">
            </div>
            <div>
                <label for="amount">amount</label>
                <input type="int" name="amount" id="amount">
            </div>
                <button type="submit" name="retrait">Retirer</button>
            </div>
        </form>
    </div>
    <div>
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>
