<?php
function Update() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "pubs";

// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 

// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$json = '{ "emp_id":"GHT50241M","fname":"Larry","lname":"Thomas","job_id":"9","job_lvl":"170","pub_id":"9999"}';
$decodedText = html_entity_decode($json);
$myArray = json_decode($decodedText, true);
$sql = "UPDATE employee E SET fname = '". $myArray['fname']. "', lname = '". $myArray['lname']. "', job_id = '". $myArray['job_id']. "', job_lvl = '". $myArray['job_lvl']. "', pub_id = '". $myArray['pub_id']. "' WHERE emp_id = '". $myArray['emp_id']. "'";

if ($conn->query($sql) === TRUE)
{ echo "Record updated successfully"; } 
else 
{ echo "Error updating record: " . $conn->error; }

$conn->close(); 
}

Update();
?>
