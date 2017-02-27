<?php
function Jobs() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "pubs";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "CALL jobs()"; 
$result = $conn->query($sql);

$return_arr = array();
if($result->num_rows > 0)
{
while($row = $result->fetch_assoc())
{
$row_array['job_id'] = $row['job_id'];
$row_array['job_desc'] = $row['job_desc'];
$row_array['min_lvl'] = $row['min_lvl'];
$row_array['max_lvl'] = $row['max_lvl'];

array_push($return_arr,$row_array);
}
}
echo json_encode($return_arr);

$conn->close(); 
}
Jobs();
?>
