<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  
<style>
table, th, td {border: 1px solid black;}  
</style>

<body>
<h1>Howard University Admission Subsystem</h1>
<h3>Update Government Agency </h3>

<form action="updateagency.php" method="post">
  <label for="ageid">Agency ID:</label>
  <input type="ageid" id="ageid" name="ageid" ><br><br>

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
    $ageid = mysqli_real_escape_string($conn, $_POST['ageid']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Update database
    $sql = "UPDATE government_agency SET GAgency_Name = '$name', GAgency_Email = '$email', GAgency_Phone = '$phone' WHERE GAgencyID = '$ageid';";
    if (mysqli_query($conn, $sql)) {
            echo "Agency record updated!"."<br>";} 
    else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}

$sql3 = "SELECT * FROM government_agency";
$result3 = mysqli_query($conn, $sql3);
if ($result3->num_rows > 0) {
    echo "<br>". "Full list of affiliated Government Agencies:"."<br>";
    while($rand3 = mysqli_fetch_assoc($result3)){
        $resultset3[]=$rand3;}
    $htmls3 = "<table><tr><th>".implode('</th><th>',array_keys($resultset3[0])).'</th></tr>';
    foreach($resultset3 as $set3){
        $htmls3 .= "<tr><td>".implode('</td><td>',$set3).'</td></tr>';}
    print $htmls3.'</table>';
    echo "". "Number of rows retrieved: " . $result3->num_rows . "<br>";} 
else {echo "No results";}

// Close database connection
mysqli_close($conn);
?>

<br><br>
<a href="agency.php">Back to Agencies page</a>

</body>
</html>