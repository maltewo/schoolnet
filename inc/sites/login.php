<?
//region Logic
include_once "../account.php";

$isLoggingIn = $_POST["login"] == "login";
$username = $_POST["account"];
$passwordHash = sha1($_POST["password"]);
$errorMessage = "Ein Fehler ist aufgetreten";
$errorOccurred = true;

if (notNull($username) && notNull($_POST["password"])) {
    if (login($username, $passwordHash)) {
        $errorOccurred = false;
    } else {
        $errorMessage = "Die eingegebenen Zugangsdaten konnten keinem Nutzerkonto zugeordnet werden.";
    }
} else {
    $errorMessage = "Bitte alle Felder ausf&uuml;llen!";
}

//endregion
?>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <form class="form-signin" method="post" action="index.php?page=login" style="margin-top: 50%; padding: 30px; display: block; background-color: rgba(255,255,255,0.8); border: 1px solid rgba(204,204,204,0.9); border-radius:6px; vertical-align: middle; opacity=0.1;">
        <h2 class="form-signin-heading">Anmelden</h2>
        <?
        if ($errorOccurred) echo "<h3 style='color: red;'>$errorMessage</h3>";
        ?>
        <input type="hidden" name="login" value="login">
        <label for="inputEmail" class="sr-only">Benutzername</label>
        <input type="email" id="inputEmail" name="account" class="form-control" placeholder="Benutzername" required autofocus>
        <label for="inputPassword" class="sr-only">Passwort</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Passwort" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 20px;">Anmelden</button>
      </form>
  </div>
  <div class="col-md-4"></div>
</div>