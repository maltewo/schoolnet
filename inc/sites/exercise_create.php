<script type="text/javascript" src="/js/exercise.js"></script>

<div class="main-container">
  <div class="col-md-3">
	
  </div>
  <form method="POST" action="">
  <div class="col-md-6">
	<h1 class="center"><b>Neue Aufgabe erstellen<b></h1>
	<div class="input-group col-md-12">
		<label for="title">Titel:</label>
		<input id="title" type="text" class="form-control" placeholder="Titel..." aria-describedby="basic-addon1" name="title">
	</div>
	<div class="form-group">
		<label for="question">Frage:</label>
		<textarea class="form-control" rows="10" id="question" name="question"></textarea>
	</div>
	
	<div class="row">
	<div class="col-md-6">
		<div class="input-group col-md-12">
		<label for="title">Frist:</label>
		<input id="title" type="date" class="form-control" aria-describedby="basic-addon1" name="timelimit">
	</div>
	</div>
	<div class="col-md-6">
		<div class="dropdown">
		<label for="dropdownMenu1" style="display: block;">Titel:</label>
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		<input type="hidden" name="group" value="" id="group"></input>
		<span id="group-text">Gruppe/Kurs</span>
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="group-dropdown">
		<li><a href="#" data-id="klasse-9C">Klasse 9C</a></li>
		<li><a href="#" data-id="klasse-8A">Klasse 8A</a></li>
		<li><a href="#" data-id="it-kurs">IT-Kurs</a></li>
		<li><a href="#" data-id="klasse-10D">Klasse 10D</a></li>
	</ul>
	</div>
	</div>
	</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-12">
				<p class="center"><input type="submit" class="btn btn-success btn-lg btn-block" value="Senden"></p>
			</div>
		</div>
  </div>
  </form>
  <div class="col-md-3">
	
  </div>
</div>

