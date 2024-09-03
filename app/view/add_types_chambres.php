<?php

$title="add Type Chambre";

require __DIR__."/layout/header.php";

    
?>

<form action="" method="post" enctype="multipart/form-data">
       <fieldset>
       <legend>Add Type Chambre</legend>
       <input type="text" name="type_chambre" placeholder="type_chambre"><br><br>
       <textarea name="description_chambre" cols="60" rows="10"></textarea><br><br>
       <input type="file" name="photo" accept="image/*"><br><br>
       <input type="submit" name="go" value="add type chambre"><br><br>
       </fieldset>
</form>

<?php


require __DIR__."/layout/footer.php";
?>

