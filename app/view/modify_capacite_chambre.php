<?php

$title="Modify Capacite Chambre";

require __DIR__."/layout/header.php";

    
?>

<form action="" method="post">
       <fieldset>
       <legend>Add capacite chambre</legend>
       <input type="text" name="titre_capacite" placeholder="titre_capacite" value="<?= $data->titre_capacite ?>"><br><br>
       <input type="number" name="numero_capacite" placeholder="numero_capacite" value="<?= $data->numero_capacite ?>"><br><br>
       <input type="submit" name="go" value="modify">
       </fieldset>
    </form>

<?php


require __DIR__."/layout/footer.php";
?>