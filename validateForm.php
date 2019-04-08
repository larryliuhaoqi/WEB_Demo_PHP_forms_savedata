<?php 
	{
		

		//user has submit the form
		print_r($_POST);
		//put data into datrabase
		//1.connect to database
		$user = 'root';
		$pass = 'hkcc1234';
		$db = new PDO('mysql:host=localhost;dbname=spd4517',$user,"");
		//2.get user input
		$form		= $_POST;
		$store 		= $_POST['store'];
		$model 		= $_POST['model'];
		$fname 		= $_POST['fname'];
		$lname    	= $_POST['lname'];
		$email      = $_POST['email'];
		$mobile		= $_POST['mobile'];
		//3.user SQL qeury
		$sql = 'INSERT INTO reservation  (rtimestamp, store, model, fname,
									lname, email, mobile) 
									VALUES (:rtimestamp, :store, :model,
									:fname, :lname, 
									:email, :mobile)';
		echo $sql . '<br>';
		$query = $db->prepare( $sql );
		$result = $query->execute(array(':rtimestamp'=>time(),
										':store'=>intval($store), ':model'=>intval($model),
										':fname'=>$fname, ':lname'=>$lname, 
										':email'=>$email, ':mobile'=>intval($mobile)));
		if ( $result ){ 
		echo "<p>Thank you. You have been registered</p>"; 
		} else { 
		echo "<p>Sorry, there has been a problem inserting your details. Please contact admin.</p>"; 
		} 
	}
?>