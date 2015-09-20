<?php 
require_once APP_ROOT . '/inc/exercise.php';
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
      
	  if ($mExercises == null || $mExercises->num_rows == 0) {
		echo "Keine verfügbaren Aufgaben!";
	  } else {
		  	while ($row = $mExercises->fetch_assoc()) {
 
				$mExercise = getExerciseById($row['ID']);
			    ?>
			    <a href="?page=exercise_results&amp;id=<?php echo $mExercise->mId;?>" class="list-group-item excercise-list">
			      <h4 class="list-group-item-heading"><?php echo $mExercise->mTitle; ?></h4>
			    </a>
				<?php 
			}
	  }?>
      
      <a type="button" href="?page=exercise_create" class="btn btn-default glyphicon glyphicon-plus pull-right" ></a>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>