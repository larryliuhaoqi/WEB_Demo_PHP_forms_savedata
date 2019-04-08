<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<title>ET Company administrator Login</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
body {
	padding-top: 20px;
	padding-bottom: 20px;
}
.navbar {
	margin-bottom: 20px;
}
.dataform {
	text-align: center;
}
</style>
</head>

<body>
<div class="container">

<!-- Static navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php" style="font-size:200%; color:black">ET Company</a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><img src="sony.png" style="width:200px; padding:10px"></li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
  <!--/.container-fluid --> 
</nav>

<!--------------------- Main component for a primary marketing message or call to action ----------------------->
<?php
		function formFilled() {
				foreach ($_POST as $value) {
						if ($value == '') {
								return false;
						}
				}
				return true;
		}


		if (empty($_POST) || !formFilled()) {
		?>

<!------------Login form------------>
<form name="login" action="admin.php" method="POST" >
  <div class="form-group" style="width:25%;position:absolute;left:37%;top:15%; border-radius:5px;padding:20px; background-color: #f2f2f2;">
    <h1>Login</h1>
    <label for 'username'>Username: </label>
    <input type="text" name="username" class="form-control" placeholder="admin"/>
    <br/>
    <label for 'password'>Password: </label>
    <input type="password" name="password" class="form-control" placeholder="pass"/>
    <br/>
    <br/>
    <button type="reset" class="btn btn-info">Reset</button>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<!------------After login------------>
<?php
		} else {
				$form = $_POST;
				$username = $form[ 'username' ];
				$password = $form[ 'password' ];
				if ($username = 'admin' && $password == 'pass') {
  ?>
<h3>Welcome! Administrator</h3>
<br/>

<!---------------Logout------------------------------> 
<a href="http://localhost/admin.php" class="btn btn-info"> <span class="glyphicon glyphicon-log-out"> </span> Log out </a> 

<!---------------Search input------------------------>
<div class="pull-right" >
  <input type="text" id="input" onkeyup="SearchFunction()" placeholder="Search by phone" title="Type in a mobile number" class="form-control">
  <br/>
</div>

<!---------------Output database table---------------> 

<br>
<table id="record" class="table table-striped" style="text-align:center">
<form action="" method="POST" style="text-align:center">
  <tr>     		 <!-----------Sort buttons------------> 
    <th class="dataform"><input type='submit' name= "ID" value= "ID" class="btn btn-info" style="width:100%"/></th>
    <th class="dataform"><input type='submit' name= "Rtimestamp" value= "Rtimestamp" class= "btn btn-info" style="width:100%"/></th>
    <th class="dataform"><input type='submit' name= "Store" value= "Store"  class= "btn btn-info" style="width:100%"/></th>
    <th class="dataform"><input type='submit' name= "Model" value= "Model"  class= "btn btn-info" style="width:100%"/></th>
    <th class="dataform"><input type='submit' name= "Firstname" value= "Firstname"  class= "btn btn-info" style="width:100%"/></th>
    <th class="dataform"><input type='submit' name= "Lastname" value= "Lastname"  class= "btn btn-info" style="width:100%"/></th>
    <th class="dataform"><input type='submit' name= "Email" value= "Email"  class= "btn btn-info" style="width:100%"/></th>
    <th class="dataform"><input type='submit' name= "Mobile" value= "Mobile"  class= "btn btn-info" style="width:100%"/></th>
    <input type="hidden" name="username" value="admin">
    <input type="hidden" name="password" value="pass">
</form>
<?php
		class TableRows extends RecursiveIteratorIterator { 
			function __construct($it) { 
				parent::__construct($it, self::LEAVES_ONLY); 
			}

			function current() {
				return "<td>" . parent::current(). "</td>";
			}

			function beginChildren() { 
				echo "<tr>"; 
			} 

			function endChildren() { 
				echo "</tr>" . "\n";
			} 
		} 
		//-------Database Login-------
		$servername = "localhost";
		$username = "root";
		$password = "hkcc1234";

		try {
			$conn = new PDO('mysql:host=localhost;dbname=spd4517',$username,"");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT * FROM reservation");
			if (isset($_POST['ID'])){
				$stmt = $conn->prepare("SELECT * FROM reservation");
			}  else if (isset($_POST['Rtimestamp'])) {
				$stmt = $conn->prepare("SELECT * FROM reservation ORDER BY rtimestamp DESC"); 
			}  else if (isset($_POST['Store'])) {
				$stmt = $conn->prepare("SELECT * FROM reservation ORDER BY store");
			}  else if (isset($_POST['Model'])) {
				$stmt = $conn->prepare("SELECT * FROM reservation ORDER BY model");
			}  else if (isset($_POST['Firstname'])) {
				$stmt = $conn->prepare("SELECT * FROM reservation ORDER BY fname"); 
			}  else if (isset($_POST['Lastname'])) {
				$stmt = $conn->prepare("SELECT * FROM reservation ORDER BY lname");
			}  else if (isset($_POST['Email'])) { 
				$stmt = $conn->prepare("SELECT * FROM reservation ORDER BY email");
			}  else if (isset($_POST['Mobile'])) {
				$stmt = $conn->prepare("SELECT * FROM reservation ORDER BY mobile"); 
			}
			$stmt->execute();

			// set the resulting array to associative
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			$rows = $stmt->fetchAll();
			//var_dump($rows);

			foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) { 
				echo $v;
			}
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
			$conn = null;
			echo "</table>";

								}else {
									echo "Error: Wrong Password or user does not exist!";
								}
		}
		
		?>
</div>
<!-- /container --> 

<!------------Search Function------------> 
<script>
			function SearchFunction() {
				var input, filter, table, tr, td, i;
				input = document.getElementById( "input" );
				filter = input.value.toUpperCase();
				table = document.getElementById( "record" );
				tr = table.getElementsByTagName( "tr" );
				for ( i = 0; i < tr.length; i++ ) {
					td = tr[ i ].getElementsByTagName( "td" )[ 7 ];
					if ( td ) {
						if ( td.innerHTML.toUpperCase().indexOf( filter ) > -1 ) {
							tr[ i ].style.display = "";
						} else {
							tr[ i ].style.display = "none";
						}
					}
				}
			}
</script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
