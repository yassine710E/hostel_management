<?php

$title="add  tarifs Chambres";

require __DIR__."/layout/header.php";

    
?>

<form action="" method="post">
    <fieldset>
        <legend>add tarif chambre</legend>
        <input type="text" name="prix_base_nuit" placeholder="prix base nuit">
        <input type="text" name="prix_base_passage" placeholder="prix base passage">
        <input type="text" name="N_prix_nuit" placeholder="Nouveau prix de nuit">
        <input type="text" name="N_prix_passage" placeholder="Nouveau prix de passage">

        <input type="submit" name="go" value="add tarif chambre">

    </fieldset>
</form>

<?php



require __DIR__."/layout/footer.php";
?>