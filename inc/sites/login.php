<?php
//region Logic
include_once "inc/account.php";
include_once "inc/utils.php";


$isLoggingIn = $_POST["login"] == "login";

if ($isLoggingIn) {
    $username = $_POST["account"];
    $passwordHash = sha1($_POST["password"]);
    $errorMessage = "Ein Fehler ist aufgetreten";
    $message = null;
    $errorOccurred = true;

    if (notNull($username) && notNull($_POST["password"])) {
        if (login($username, $passwordHash)) {
            $message = "Angemeldet!";
            redirectTo("index.php?page=overview");
            $errorOccurred = false;
        } else {
            $errorMessage = "Die eingegebenen Zugangsdaten konnten keinem Nutzerkonto zugeordnet werden.";
        }
    } else {
        $errorMessage = "Bitte alle Felder ausfüllen!";
    }
}

//endregion
?>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <?php
      if ($errorOccurred) echo "<div class='alert alert-danger' role='alert'>$errorMessage</div>";
      if (notNull($message)) echo "<h3 style='color: green;'>$message</h3>";
    ?>

    <form class="form-signin" method="post" action="index.php?page=login" style="margin-top: 50%; padding: 30px; display: block; background-color: rgba(255,255,255,0.8); border: 1px solid rgba(204,204,204,0.9); border-radius:6px; vertical-align: middle; opacity=0.1;">
        <h2 class="form-signin-heading">Anmelden</h2>
        <?php

        //if ($errorOccurred) echo "<h3 style='color: red;'>$errorMessage</h3>";
        //if (notNull($message)) echo "<h3 style='color: green;'>$message</h3>";
        ?>
        <input type="hidden" name="login" value="login">
        <input type="text" name="account" class="form-control" placeholder="Benutzername" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Passwort" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 20px;">Anmelden</button>
      </form>
  </div>
  <div class="col-md-4"></div>
</div>
