<?php

$title="Dashboard";

require __DIR__."/layout/header.php";

    
?>

<a href="/capacite_chambre">capaciter_chambre <?= $data['capaciter_chambre'] ?></a>
<a href="#">chambre <?= $data['chambre'] ?></a>
<a href="#">client <?= $data['client'] ?></a>
<a href="#">reservation <?= $data['reservation'] ?></a>
<a href="#">tarif_chambre <?= $data['tarif_chambre'] ?></a>
<a href="/types_chambres">type_chambre <?= $data['type_chambre'] ?></a><br><br><br><br>




<a href="/public/logout">logout</a>

<?php


require __DIR__."/layout/footer.php";
?>