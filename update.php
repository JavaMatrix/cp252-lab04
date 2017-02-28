<?php
function Update($json) {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "pubs";

// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 

// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$decodedText = html_entity_decode($json);
$myArray = json_decode($decodedText, true);
$sql = "CALL nupdate('".$myArray['emp_id']."', '".$myArray['fname']. "', '". $myArray['lname']. "', '". $myArray['job_id']. "', '". $myArray['job_lvl']. "', '". $myArray['pub_id']."')";

if ($conn->query($sql) === TRUE)
{ echo "Record updated successfully"; } 
else 
{ echo "Error updating record: " . $conn->error; }

$conn->close(); 
}

// Trevor, I updated this to listen to the post data. - Nate
Update($_POST['emp']);
?>
