<?php

$title="Login Page";

require __DIR__."/layout/header.php";

    
?>
    <form action="" method="post">
       <fieldset>
       <legend>LOGIN</legend>
       <input type="text" name="username" placeholder="username"><br><br>
       <input type="password" name="password" placeholder="password"><br><br>
       <input type="submit" name="go" value="login">
       </fieldset>
    </form>

<?php


require __DIR__."/layout/footer.php";
?>