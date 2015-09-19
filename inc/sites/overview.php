<?php 
include_once '../exercise.php';
?>
<div class="row">
  
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="page-header">
      <h1>Aufgabenübersicht</h1>
    </div>
    <div class="list-group">
      
      <?php 
	  $mExercises = getExercises();
	  
	  foreach ($mExercises as $mExerciseID) {
		$mExercise = getExerciseById($mExerciseID);
      ?>
      <a href="#" class="list-group-item excercise-list">
        <h4 class="list-group-item-heading"><?php echo $mExercise->mTitle; ?></h4>
        <p class="list-group-item-text"></p>
      </a>
	  <?php 
	  } ?>
      
    </div>
  </div>
  <div class="col-md-3"></div>
</div>