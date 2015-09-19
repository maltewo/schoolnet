<?php 
include_once 'inc/exercise.php';
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

	  var_dump($mExercises);
  
	  if ($mExercises == null) {
		echo "Keine verfügbaren Aufgaben!";
	  } else {
		  foreach ($mExercises as $mExerciseID) {
			$mExercise = getExerciseById($mExerciseID);
	      ?>
	      <a href="?id=<?php echo $mExercise->mId;?>" class="list-group-item excercise-list">
	        <h4 class="list-group-item-heading"><?php echo $mExercise->mTitle; ?></h4>
	      </a>
		  <?php 
		  } 
	  }?>
      
    </div>
  </div>
  <div class="col-md-3"></div>
</div>