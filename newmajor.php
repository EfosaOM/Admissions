<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  

<body>
<h1>Howard University Admission Subsystem</h1>
<h3>Add Academic Major</h3>

<form action="newmajor.php" method="post">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>

  <label for="deptid">Department ID:</label>
  <input type="deptid" id="deptid" name="deptid" required><br><br>

  <input type="submit" name="submit" value="Submit">
</form>
<br><br>

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

if(array_key_exists('submit', $_POST)) {
    // Get values submitted through form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $deptid = mysqli_real_escape_string($conn, $_POST['deptid']);

    // Insert data into database    
    $sql = "INSERT INTO major (Major_Name, DepartmentID) VALUES ('$name', '$deptid')";
    if (mysqli_query($conn, $sql)) {
            echo "New major has been added!"."<br>";} 
    else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
// Close database connection
mysqli_close($conn);
?>

<br>
<a href="major.php">Back to Academic Majors and Departments page</a>

</body>
</html>