<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  

<body>
<h1>Howard University Admission Subsystem</h1>
<h3>Application form</h3>

<form action="newapplication.php" method="post">
  <label for="firstname">First Name:</label>
  <input type="text" id="firstname" name="firstname" required><br><br>

  <label for="lastname">Last Name:</label>
  <input type="text" id="lastname" name="lastname" required><br><br>  

  <label for="address">Address:</label>
  <input type="address" id="address" name="address" required><br><br>

  <label for="city">City:</label>
  <input type="city" id="city" name="city" required><br><br>

  <label for="state">State:</label>
  <input type="state" id="state" name="state" required><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>

  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" required><br><br>

  <label for="major">Major:</label>
  <input type="major" id="major" name="major" ><br><br>

  <label for="gagency">Government Agency:</label>
  <input type="gagency" id="gagency" name="gagency" ><br><br>

  <label for="sat">SAT:</label>
  <input type="sat" id="sat" name="sat" ><br><br>

  <label for="hschool">High School:</label>
  <input type="text" id="hschool" name="hschool" ><br><br>

  <label for="hschoolgpa">High School GPA:</label>
  <input type="hschoolgpa" id="hschoolgpa" name="hschoolgpa" ><br><br>

  <label for="ec">Extracurriculars:</label>
  <input type="text" id="ec" name="ec" ><br><br>

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
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);
    $gagency = mysqli_real_escape_string($conn, $_POST['gagency']);
    $sat = mysqli_real_escape_string($conn, $_POST['sat']);
    $hschool = mysqli_real_escape_string($conn, $_POST['hschool']);
    $hschoolgpa = mysqli_real_escape_string($conn, $_POST['hschoolgpa']);
    $ec = mysqli_real_escape_string($conn, $_POST['ec']);

    $sql0 = "
    CREATE TRIGGER Student_Application_Trigger BEFORE INSERT ON applications
    FOR EACH ROW
    BEGIN
        INSERT INTO Student_Applicant(Std_Fname, Std_Lname, Std_Address, Std_City, Std_State, Std_Email, Std_Phone) VALUES ('$firstname', '$lastname', '$address', '$city', '$state', '$email', '$phone');
        SET NEW.Std_ID = LAST_INSERT_ID();
    END
    ";
    if (mysqli_query($conn, $sql0)) {
        echo "Trigger activated!"."<br>";} 
    else {
        echo "Error: " . $sql0 . "<br>" . mysqli_error($conn);}

    // Insert data into database    
    $sql = "INSERT INTO Applications (MajorID, GAgencyID, Std_SAT, Std_HSname, Std_HSgpa, Std_EC) VALUES ('$major', '$gagency', '$sat','$hschool','$hschoolgpa','$ec')";
    if (mysqli_query($conn, $sql)) {
            echo "Your application has been submitted!"."<br>";} 
    else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
    
    $sql1 = "DROP TRIGGER Student_Application_Trigger";
    if (mysqli_query($conn, $sql1)) {
            echo "Trigger finished!";} 
    else {echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);}

}
// Close database connection
mysqli_close($conn);
?>

<br><br>
<a href="application.php">Back to Applications page</a>

</body>
</html>