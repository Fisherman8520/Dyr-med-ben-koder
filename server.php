<?php
session_start();
// connect to database
$db = mysqli_connect('localhost', 'root', 'nani', 'crud-dyr');

// initialize variables
    $dyr = "";
    $ben = "";
    $id = 0;
    $update = false;

// if save button is clicked
if (isset($_POST['gem'])) {
    $dyr = $_POST['dyr'];
    $ben = $_POST['ben'];
    
    mysqli_query($db, "INSERT INTO info (dyr, ben) VALUES ('$dyr', '$ben')");
    $_SESSION['message'] = "Dyr Tilføjet";
    header('location: index.php'); // redirect to index page after inserting 
}
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$dyr = $_POST['dyr'];
	$ben = $_POST['ben'];

	mysqli_query($db, "UPDATE info SET dyr='$dyr', ben='$ben' WHERE id=$id");
	$_SESSION['message'] = "Dyr opdateret!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Dyr slettet!"; 
	header('location: index.php');
}
// retrive records
    $results = mysqli_query($db, "SELECT * FROM info");
?>