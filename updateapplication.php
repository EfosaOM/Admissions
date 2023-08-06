<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  
<style>
table, th, td {border: 1px solid black;}  
</style>

<body>
<h1>Howard University Admission Subsystem</h1>
<h3>Update Application</h3>

<form action="updateapplication.php" method="post">
  <label for="appid">Application ID:</label>
  <input type="appid" id="appid" name="appid" ><br><br>

  <label for="officer">Admission Officer:</label>
  <input type="officer" id="officer" name="officer" ><br><br>

  <label for="status">Admission Status:</label>
  <input type="status" id="status" name="status" ><br><br>

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
    $appid = mysqli_real_escape_string($conn, $_POST['appid']);
    $officer = mysqli_real_escape_string($conn, $_POST['officer']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update database
    $sql = "UPDATE applications SET OfficerID = '$officer', App_Status = '$status' WHERE ApplicationID = '$appid';";
    if (mysqli_query($conn, $sql)) {
            echo "Application updated!"."<br>";} 
    else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}

$sql3 = "SELECT ApplicationID, Std_FName, Std_LName,	Major_Name, Std_SAT, Std_HSgpa, Std_HSname, Std_EC, GAgency_Name, Officer_Fname, Officer_Lname, App_Status FROM applications INNER JOIN student_applicant ON applications.Std_ID=student_applicant.Std_ID LEFT OUTER JOIN major ON applications.MajorID=major.MajorID LEFT OUTER JOIN admission_officer ON applications.OfficerID=admission_officer.OfficerID LEFT OUTER JOIN government_agency ON applications.GAgencyID=government_agency.GAgencyID";
$result3 = mysqli_query($conn, $sql3);
if ($result3->num_rows > 0) {
    echo "<br>". "Full list of Applications:"."<br>";
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
<a href="application.php">Back to Applications page</a>

</body>
</html>