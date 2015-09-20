<?php 
require_once APP_ROOT . '/inc/exercise.php';

if (isset($_GET["delId"])) {
	deleteExercise($_GET["delId"]);
}
?>

<div class="row">
  
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <h1>Aufgabenübersicht</h1>
    <div class="list-group">
      
      <?php 
      
      $mExercises = getExercises();
      
	  if ($mExercises == null || $mExercises->num_rows == 0) {
		echo "Keine verfügbaren Aufgaben!";
	  } else {
		  	while ($row = $mExercises->fetch_array(MYSQLI_ASSOC)) {
				$mExercise = getExerciseById($row['ID']);

                if ($mExercise != null) {
                  ?>
                  <a href="?page=exercise_results&amp;id=<?php echo $mExercise->mId; ?>"
                     class="list-group-item excercise-list">
                    <a href="?page=overview&delId=<?php echo $mExercise->mId?>" class="glyphicon glyphicon-remove"></a>
                    <span style="font-size: 18px;"><?php echo htmlspecialchars($mExercise->mTitle); ?></span>
                  </a>
                  <?php
                }
			}
	  }?>
      <?php if ($_SESSION["role"] == 2 || $_SESSION["role"] == 3) {?>
          <br>
      <a type="button" href="?page=exercise_create" class="btn btn-default glyphicon glyphicon-plus pull-right" ></a>
      <?php }?>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>