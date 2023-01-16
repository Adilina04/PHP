<?php 

echo $_GET['pseudo'];

?>
<a href="index.php?pseudo=test">Go to pseudo test</a>

<form action="d_get.php" method="get">
	<input type="text" name="pseudo">
	<button type="submit">Envoyer</button>
</form>