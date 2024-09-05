<?php

$title="modify  clients";

require __DIR__."/layout/header.php";

    
?>

<form action="" method="post">
 

        <!-- Full Name -->
        <label for="nom_complet">Full Name:</label>
        <input type="text" id="nom_complet" name="nom_complet" value="<?= $data->nom_complet ?>" ><br><br>

        <!-- Gender -->
        <label for="sexe">Gender:</label>
        <select id="sexe" name="sexe" >
            <option value="Male" <?php echo $data->sexe=="Male"?"selected":"" ?>>Male</option>
            <option value="Female" <?php echo $data->sexe=="Female"?"selected":"" ?>>Female</option>
        </select><br><br>

        <!-- Date of Birth -->
        <label for="date_naissance">Date of Birth:</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?= $data->date_naissance ?>" ><br><br>

        <!-- Age -->
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="0"  value="<?= $data->age ?>"><br><br>

        <!-- Country -->
        <label for="pays">Country:</label>
        <input type="text" id="pays" name="pays" value="<?= $data->pays ?>" ><br><br>

        <!-- City -->
        <label for="ville">City:</label>
        <input type="text" id="ville" name="ville" value="<?= $data->ville ?>" ><br><br>

        <!-- Address -->
        <label for="adresse">Address:</label>
        <input type="text" id="adresse" name="adresse" value="<?= $data->adresse ?>"><br><br>

        <!-- Telephone -->
        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone" value="<?= $data->telephone ?>" ><br><br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $data->email ?>" ><br><br>

        <!-- Other Details -->
        <label for="autres_details">Other Details:</label>
        <textarea id="autres_details" name="autres_details" rows="4" cols="50" value="<?= $data->autres_details ?>"></textarea><br><br>

        <!-- Submit Button -->
        <input type="submit" value="modify client" name="go">
    </form>

<?php



require __DIR__."/layout/footer.php";
?>