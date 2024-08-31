<?php

$title="Dashboard";

require __DIR__."/layout/header.php";

    
?>

<a href="#">capaciter_chambre <?= $data['capaciter_chambre'] ?></a><br>
<a href="#">chambre <?= $data['chambre'] ?></a><br>
<a href="#">client <?= $data['client'] ?></a><br>
<a href="#">reservation <?= $data['reservation'] ?></a><br>
<a href="#">tarif_chambre <?= $data['tarif_chambre'] ?></a><br>
<a href="#">type_chambre <?= $data['type_chambre'] ?></a><br><br><br><br>




<a href="/public/logout">logout</a>

<?php


require __DIR__."/layout/footer.php";
?>