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
<h3>Admission Officers</h3>

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

$sqls = "SELECT * FROM admission_officer";
$results = mysqli_query($conn, $sqls);
if ($results->num_rows > 0) {
    echo "<br>". "Full list of Admission Officers:"."<br>";
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


// Close connection
mysqli_close($conn);
?>
<br>
<a href="newofficer.php">Click here to add new officer</a>
<br><br>
<a href="updateofficer.php">Click here to update officer record</a>
<br><br>
<a href="index.php">Click here to go back to Home</a>
</body>
</html>