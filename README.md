# cp252-lab04
CP252 Lab04 for Nathanael Page and Trevor Rouse
SELECT job_id, job_desc FROM jobs
SELECT pub_id, pub_name FROM publishers
SELECT emp_id, fname, lname, job_desc, job_lvl, pub_name FROM employee E INNER JOIN jobs J ON J.job_id = E.job_id INNER JOIN publishers P ON P.pub_id = E.pub_id;
UPDATE employee E SET fname = 'Ann', lname = 'Devon', job_id = '14', job_lvl = '200', pub_id = '9999' WHERE emp_id = 'POK93028M';

<?php
 $servername = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "Pubs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 $sql = "UPDATE employee E SET fname = 'Ann', lname = 'Devon', job_id = '14', job_lvl = '200', pub_id = '9999' WHERE emp_id = 'POK93028M';

if ($conn->query($sql) === TRUE) {
     echo "Record updated successfully";
 } else {
     echo "Error updating record: " . $conn->error;
 }

 $conn->close();
?> 
