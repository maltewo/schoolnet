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
	

	<!-- Zu wiederholende Schleife -->
	<div class="loesung">
		<h3>Max Mustermann</h3>
		<p>Lösungen als Fließtext kjadkfksdabjjasdjfgf jsad kfj asdfgjakjgka hfugjkahdf jgkaf sjhga hagjf hkfg kjahjkahgjfhkjgfhjh kj </p>
	</div>
	
	<?php 
	$mAnswers = getAnswersByExerciseId($_GET["id"]);
	if ($mAnswers != null) {
		foreach ($mAnswers as $mAnswerId) {
			$mAnswer = getAnswerById();
	?>
		<div class="loesung">
			<h3><?php echo $mAnswer->mOwner;?></h3>
			<p><?php echo $mAnswer->mText;?></p>
		</div>
	<?php }
	} ?>
  </div>
  <div class="col-md-3"></div>
</div>