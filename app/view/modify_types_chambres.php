
<?php

$title="Modify Type Chambre";

require __DIR__."/layout/header.php";

    
?>

<form action="" method="post" enctype="multipart/form-data">
       <fieldset>
       <legend>Add Type Chambre</legend>
       <input type="text" name="type_chambre" placeholder="type_chambre" value="<?= $data->type_chambre ?>"><br><br>
       <textarea name="description_chambre" cols="60" rows="10" ><?= $data->description_type ?></textarea><br><br>
       <input type="file" name="photo" accept="image/*"><img src="/pictures/types_chambres/<?= htmlspecialchars($data->photo_type_chambre) ?>" alt="Room Photo" width="200" height="150">
       <br><br>
       
       <input type="submit" name="go" value="modify type chambre"><br><br>
       </fieldset>
</form>

<?php


require __DIR__."/layout/footer.php";
?>


