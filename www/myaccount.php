<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: register.php');
  exit;
}

// Récupère les informations de l'utilisateur connecté depuis la base de données
$user = getUserData($_SESSION['username']);
$balance = getUserBalance($user['id']);
$transactions = getUserTransactions($user['id']);

?>
<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <h1>My Account</h1>
  </div>
  <div class="account-info">
    <h2>Informations sur le compte</h2>
    <p>Nom d'utilisateur : <?php echo $user['username']; ?></p>
    <p>Solde : <?php echo $balance; ?> <?php echo $user['devise']; ?></p>
  </div>
  <div class="transactions">
    <h2>Dernières transactions</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Montant</th>
        <th>Expéditeur</th>
        <th>Destinataire</th>
      </tr>
      <?php foreach ($transactions as $transaction): ?>
        <tr>
          <td><?php echo $transaction['date']; ?></td>
          <td><?php echo $transaction['amount']; ?> <?php echo $user['devise']; ?></td>
          <td><?php echo $transaction['emitter']; ?></td>
          <td><?php echo $transaction['receiver']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <div class="actions">
    <h2>Actions</h2>
    <ul>
      <li><a href="depot.php">Effectuer un dépôt</a></li>
      <li><a href="withdraw.php">Effectuer un retrait</a></li>
    </ul>
  </div>
  <div class="footer">
    <a href="logout.php">Se déconnecter</a>
  </div>
</body>
</html>
