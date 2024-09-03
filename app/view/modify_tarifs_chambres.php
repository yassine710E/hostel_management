<?php

$title="modify  tarifs Chambres";

require __DIR__."/layout/header.php";

    
?>

<form action="" method="post">
    <fieldset>
        <legend>modify tarif chambre</legend>
        <input type="text" name="prix_base_nuit" placeholder="prix base nuit" value="<?= $data->prix_base_nuit ?>">
        <input type="text" name="prix_base_passage" placeholder="prix base passage" value="<?= $data->prix_base_passage ?>">
        <input type="text" name="N_prix_nuit" placeholder="Nouveau prix de nuit" value="<?= $data->N_prix_nuit ?>">
        <input type="text" name="N_prix_passage" placeholder="Nouveau prix de passage" value="<?= $data->N_prix_passage ?>">

        <input type="submit" name="go" value="modify tarif chambre">

    </fieldset>
</form>

<?php


require __DIR__."/layout/footer.php";
?>