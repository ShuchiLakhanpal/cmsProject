<?php

include_once('dbconnect.php');
//echo"Connected";

if(isset($_POST['date']) && isset($_POST['category']) && isset($_POST['title']) && isset($_POST['image']) 
&& isset($_POST['description']) && isset($_POST['author']) && isset($_POST['status'])) 
{
    $date = $_POST['date'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $status = $_POST['status']; 

$sql = "Insert into news (date, category, title, image, description, author, status)
 values($date, $category, $title, $image, $description, $author, $status)";
try{
$results = $db->prepare($sql);
$results ->execute();

echo "New record created successfully";
	$db = null;

}
catch(PDOException $e)
{
    echo"Error:" .$e->getMessage();
}
 



}
?>