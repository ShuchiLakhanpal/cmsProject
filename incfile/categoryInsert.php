<?php

// echo'test';
       include('dbconnect.php');

      $db = new PDO($dsn,$username,$password);  

      if(isset($_POST['category']))
      {
          $category = $_POST['category'];
          
    
      $sql = "Insert Into category (category) values('$category')";

      //query to db to select

//try catch error for selectinf data using exec

try
{
	// echo"Inserting Data with exec</br/>";
	$results = $db->prepare($sql);
	$results->execute();

	 
//echo "New record created successfully";
	$db = null;
	// echo "end Insertion<br/>";
}

catch(PDOException $e)
{
	echo "Error:".$e->getMessage();
}

}

?>
