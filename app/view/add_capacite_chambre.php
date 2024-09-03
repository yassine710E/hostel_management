<?php

$title="add Capacite Chambre";

require __DIR__."/layout/header.php";

    
?>
<form action="" method="post">
       <fieldset>
       <legend>Add capacite chambre</legend>
       <input type="text" name="titre_capacite" placeholder="titre_capacite"><br><br>
       <input type="number" name="numero_capacite" placeholder="numero_capacite"><br><br>
       <input type="submit" name="go" value="add">
       </fieldset>
    </form>

<?php


require __DIR__."/layout/footer.php";
?>