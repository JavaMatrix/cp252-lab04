<?php
function View() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "pubs";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "CALL view()"; 
$result = $conn->query($sql);

$return_arr = array();
if($result->num_rows > 0)
{
while($row = $result->fetch_assoc())
{
$row_array['emp_id'] = $row['emp_id'];
$row_array['fname'] = $row['fname'];
$row_array['lname'] = $row['lname'];
$row_array['job_id'] = $row['job_id'];
$row_array['job_lvl'] = $row['job_lvl'];
$row_array['pub_id'] = $row['pub_id'];

array_push($return_arr,$row_array);
}
}
echo json_encode($return_arr);
$conn->close(); 
}
View();
?>
