<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  

<body>
<h1>Howard University Admission Subsystem</h1>
<h3>Add Government Agency</h3>

<form action="newagency.php" method="post">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>

  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" required><br><br>

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
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Insert data into database    
    $sql = "INSERT INTO government_agency (GAgency_Name, GAgency_Email, GAgency_Phone) VALUES ('$name', '$email','$phone')";
    if (mysqli_query($conn, $sql)) {
            echo "New agency has been added!"."<br>";} 
    else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
// Close database connection
mysqli_close($conn);
?>

<br>
<a href="agency.php">Back to Government Agencies page</a>

</body>
</html>