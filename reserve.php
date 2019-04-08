<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<title>Reserve and Pick Up</title>
</head>
<body>
<div class="container" style="width:50%">

<?php

	function formFilled() { 
		foreach ($_POST as $input) {
			if ($input == ''){
				return false;
			}
		}
		return true;
	}
	if (empty($_POST) || !formFilled()) {
	
?>

<h1>ET Company</h1>
<hr/>
<img src="Xperia_XZ.png" style="width:100%; text-align:center;" />
<h2>Rserve Form</h2>

<form name="reserve" action="validateForm.php" method="post">
  <label for 'store'>Store: </label>
   <select name="store" class="form-control">
  <option value="1">		IFC Mall</option>
  <option value="2">Festival Walk </option>
  <option value="3">	Hysan Place </option>
  <option value="4">			APM</option>
  </select>
  <label for 'model'>Model: </label> 
  <select name="model" class="form-control">
  <option value="1" >16 GB</option>
  <option value="2" >32 GB</option>
  <option value="3" >64 GB</option>
  <option value="4"> 128 GB</option>
  </select> 
  <label for 'fname'>First name: </label> 
  <input type="text" name="fname" class="form-control" required /> 
  <label for 'lname'>Last name: </label> 
  <input type="text" name="lname" class="form-control" required /> 
  <label for 'email'>Email: </label> 
  <input type="email" name="email" class="form-control" required /> 
  <label for 'mobile'>Mobile: </label> 
  <input type="number" name="mobile" class="form-control" required /> 
  <br/> 
  <button type="reset" class="btn btn-info" >Reset</button>
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>
</form>
<?php
} else {
?>
<p>Thank you. You have been registered</p>
<?php
}
?>
<hr/>
<p>Due  to  the  strong  demand,  SmartPhone  4517  only  acc
ept  a  limited  number  of reservations.  If  you  want  to  order  the SmartPhone  4517,
  select  retail  stores  and SmartPhone 4517 
models. If, your SmartPhone 4517
 booking application is successful, 
you will receive an email confirmation notice befor
e 23:55 tonight. </p>
<p>If you do not receive an email, which represents th
e order fails. Only the customers who receive an email can  buy the 
SmartPhone 4517 at the stores. You can apply for booking  the 
SmartPhone  4517  every  weekday from  09:00  to  17:00.  Please  try  again 
later to submit a reservation.</p>

</div>
</body> 
</html>