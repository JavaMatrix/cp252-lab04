<!DOCTYPE html>
<html>
<head>
<title>
Testing
</title>
</head>
<body>
<h1>View functions</h1>

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

$sql = "SELECT emp_id, fname, lname, job_desc, job_lvl, pub_name FROM employee E INNER JOIN jobs J ON J.job_id = E.job_id INNER JOIN publishers P ON P.pub_id = E.pub_id"; 
$result = $conn->query($sql);

if($result->num_rows > 0)
{
echo "<table><tr><th>ID</th><th>Name</th><th>Name</th></tr>";

while($row = $result->fetch_assoc())
{
echo "<tr><td>".$row["emp_id"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td></tr>";
}

echo "</table>";
}
else
{
echo "No Results";
}

$conn->close(); 
}

View();

function Pubs() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "pubs";

// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 

// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$sql = "SELECT pub_id, pub_name FROM publishers";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
echo "<table><tr><th>ID</th><th>Name</th></tr>";

while($row = $result->fetch_assoc())
{
echo "<tr><td>".$row["pub_id"]."</td><td>".$row["pub_name"]."</td></tr>";
}

echo "</table>";
}
else
{
echo "No Results";
}

$conn->close(); 
}

Pubs();

function Jobs() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "pubs";

// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 

// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$sql = "SELECT * FROM jobs"; 
$result = $conn->query($sql);

if($result->num_rows > 0)
{
echo "<table><tr><th>ID</th><th>Name</th><th>Name</th></tr>";

while($row = $result->fetch_assoc())
{
echo "<tr><td>".$row["job_id"]."</td><td>".$row["job_desc"]."</td><td>".$row["min_lvl"]."</td></tr>";
}

echo "</table>";
}
else
{
echo "No Results";
}

$conn->close(); 
}

Jobs();
?>

</body>
</html>
