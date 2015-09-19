<?
    include_once "inc/template.php";
    templateStart();
?>

<body background = "img/background.jpg" style = "background-size: cover">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SchoolNet</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


<div class="row">
  <div class="center" style="max-width: 600px;">
  	<form class="form-signin" style="margin-top: 50%; padding: 30px; display: block; background-color: rgba(255,255,255,0.8); border: 1px solid rgba(204,204,204,0.9); border-radius:6px; vertical-align: middle; opacity=0.1;">
        <h2 class="form-signin-heading">Anmelden</h2>
        <label for="inputEmail" class="sr-only">E-Mail Adresse</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 20px;">Anmelden</button>
      </form>
  </div>
</div>

<?
templateStop();