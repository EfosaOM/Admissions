<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  
<style>
table, th, td {border: 1px solid black;}  
input[type=text], select, textarea {
  width: 100%;
  padding: 12px 20px;
  border: 2px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  float: left;
  margin-top: 6px;
  height: 150px;
  box-sizing: border-box;
  font-size: 16px;
  resize: none;}
</style>

<body>
<h1>Howard University Admission Subsystem</h1>
<h3>Academic Majors and Departments</h3>

<?php
// database credentials
$servername = "localhost";
$username = "root";
$password = "[q7hp)s(Z)GS#7#";
$dbname = "admissions";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}

$sqls = "SELECT MajorID, Major_Name, Dept_Name FROM major INNER JOIN department ON major.DepartmentID=department.DepartmentID";
$results = mysqli_query($conn, $sqls);
if ($results->num_rows > 0) {
    echo "<br>". "Full list of Academic Majors:"."<br>";
    while($rand = mysqli_fetch_assoc($results)){
        $resultset[]=$rand;
    }
    $htmls = "<table><tr><th>".implode('</th><th>',array_keys($resultset[0])).'</th></tr>';
    foreach($resultset as $set){
        $htmls .= "<tr><td>".implode('</td><td>',$set).'</td></tr>';
    }
    print $htmls.'</table>';
    echo "". "Number of rows retrieved: " . $results->num_rows . "<br>";} 
else {echo "No results";}

$sqls2 = "SELECT * FROM department";
$results2 = mysqli_query($conn, $sqls2);
if ($results2->num_rows > 0) {
    echo "<br>". "Full list of Academic Departments:"."<br>";
    while($rand2 = mysqli_fetch_assoc($results2)){
        $resultset2[]=$rand2;
    }
    $htmls2 = "<table><tr><th>".implode('</th><th>',array_keys($resultset2[0])).'</th></tr>';
    foreach($resultset2 as $set2){
        $htmls2 .= "<tr><td>".implode('</td><td>',$set2).'</td></tr>';
    }
    print $htmls2.'</table>';
    echo "". "Number of rows retrieved: " . $results2->num_rows . "<br>";} 
else {echo "No results";}

// Close connection
mysqli_close($conn);
?>
<br>
<a href="newmajor.php">Click here to add new major</a>
<br><br>
<a href="newdepartment.php">Click here to add new department</a>
<br><br>
<a href="index.php">Click here to go back to Home</a>
</body>
</html>