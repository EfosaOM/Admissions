<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  

<body>
<h1>Howard University Admission Subsystem</h1>
<h3>Add Admission Officer</h3>

<form action="newofficer.php" method="post">
  <label for="firstname">First Name:</label>
  <input type="text" id="firstname" name="firstname" required><br><br>

  <label for="lastname">Last Name:</label>
  <input type="text" id="lastname" name="lastname" required><br><br>  

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
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Insert data into database    
    $sql = "INSERT INTO admission_officer (Officer_Fname, Officer_Lname, Officer_Email, Officer_Phone) VALUES ('$firstname', '$lastname', '$email','$phone')";
    if (mysqli_query($conn, $sql)) {
            echo "New officer has been added!"."<br>";} 
    else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
// Close database connection
mysqli_close($conn);
?>

<br>
<a href="officer.php">Back to Officers page</a>

</body>
</html>