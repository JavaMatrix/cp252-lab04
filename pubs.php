<?php

function Pubs() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "pubs";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "CALL pubs()";
$result = $conn->query($sql);

$return_arr = array();
if($result->num_rows > 0)
{
while($row = $result->fetch_assoc())
{
$row_array['pub_id'] = $row['pub_id'];
$row_array['pub_name'] = $row['pub_name'];

array_push($return_arr,$row_array);
}
}
echo json_encode($return_arr);

$conn->close(); 
}
Pubs();
?>
