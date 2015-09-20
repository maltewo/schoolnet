<?php 
include_once('inc/exercise.php');

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
				<textarea class="form-control" rows="10" id="answer" name="answer">
		<?
		$mAnswer = getAnswersByExerciseId($_GET["id"]);
		var_dump($mAnswer);
		if ($mAnswerId != false) { 
			$mAnswerId = $mAnswer->fetch_assoc();
		}
		if (isset($mAnswerId["ID"])) {
			$mAnswerText = getAnswerById($mAnswerId["ID"]);
			echo $mAnswerText["TEXT"];
		}
	?>			</textarea>
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
				<p><?php echo $mAnswer->mText;?></p>
			</div>
		<?php }
		} 
	}?>
  </div>
  <div class="col-md-3"></div>
</div>