<?php



$databaseHost = 'localhost';
$databaseName = 'damu_sasa';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if(!$mysqli){
    echo "not connected";
}
	
?>
