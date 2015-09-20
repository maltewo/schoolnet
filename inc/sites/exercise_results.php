<?php 
include_once('inc/exercise.php');
echo $_POST["action"];
if (array_key_exists("action", $_POST)) {
	if ($_POST["action"] == "new") {
		echo "Neue Antwort";
		addAnswer($_POST["answer"], $_GET["id"]);
	} else {
		echo "Antwort bearbeiten";
		updateAnswer($_POST["answer"], $_GET["id"]);
	}
}

$mExercise = getExerciseById($_GET["id"]);
?>

<div class="main-container">
  <div class="col-md-3">
	
  </div>
  <div class="col-md-6">
	<h1><?php echo $mExercise->mTitle;?></h1>
	<h2>Aufgabenstellung:</h2>
	<p><?php echo $mExercise->mText;?></p>
	<h2>Lösungen:</h2>
	<?php 
	if ($_SESSION["role"] == 4) {
		
		?>
		<form method="POST" action="">
			<div class="form-group">
				<label for="answer">Antwort:</label>
				<textarea class="form-control" rows="10" id="answer" name="answer"><?
				$mAnswer = getAnswersByExerciseId($_GET["id"]);
				$mAnswerExists = false;
				if ($mAnswerId != false) { 
					$mAnswerId = $mAnswer->fetch_assoc();
					$mAnswerExists = true;
				}
				if (isset($mAnswerId["ID"])) {
					$mAnswerText = getAnswerById($mAnswerId["ID"]);
					echo htmlspecialchars($mAnswerText["TEXT"]);
				}
				?></textarea>
				<button type="submit" class="btn btn-default pull-right">Speichern</button>
				<input type="text" class="hidden" id="action" value="<?php if ($mAnswerExists) { echo "edit"; } else { echo "new"; }?>"/>
			</div>
		</form>
	<?php 
	} else if ($_SESSION["role"] == 2 || $_SESSION["role"] == 3) {	
		$mAnswers = getAnswersByExerciseId($_GET["id"]);
		if ($mAnswers != null) {
			while ($mAnswerId = $mAnswers->fetch_assoc()) {
				$mAnswer = getAnswerById($mAnswerId["ID"]);
		?>
			<div class="loesung">
				<h3><?php echo getUserById($mAnswer->mOwner);?></h3>
				<p><?php echo htmlspecialchars($mAnswer->mText);?></p>
			</div>
		<?php }
		} 
	}?>
  </div>
  <div class="col-md-3"></div>
</div>