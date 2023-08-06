<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  
<style>
table, th, td {border: 1px solid black;}  
input[type=text], select, textarea {
  width: 20%;
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
<h3>Applications</h3>

<form method = "post">
  <textarea id="querybox" name="querybox" placeholder="Filter by SAT score..." style="height:50px"></textarea><br>
  <input type="submit" name = "runquery" value="Search">
  <input type="submit" value="Clear" onclick="javascript:eraseText();">
</form>
<br>
<form method = "post">
  <textarea id="querybox2" name="querybox2" placeholder="Filter by GPA..." style="height:50px"></textarea><br>
  <input type="submit" name = "runquery2" value="Search">
  <input type="submit" value="Clear" onclick="javascript:eraseText2();">
</form>
<br>
<form method = "post">
  <textarea id="querybox4" name="querybox4" placeholder="Filter by Admission Status..." style="height:50px"></textarea><br>
  <input type="submit" name = "runquery4" value="Search">
  <input type="submit" value="Clear" onclick="javascript:eraseText2();">
</form>

<script>
function eraseText() {
    document.getElementById("querybox").value = "";
    window.location.reload(true);}
function eraseText2() {
    document.getElementById("querybox2").value = "";
    window.location.reload(true);}   
function eraseText4() {
    document.getElementById("querybox4").value = "";
    window.location.reload(true);}         
</script>
<br>

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

if(array_key_exists('runquery', $_POST)) {
    $nom = $_POST['querybox'];
    $sql = "SELECT ApplicationID, Std_FName, Std_LName,	Major_Name, Std_SAT, Std_HSgpa, Std_HSname, Std_EC, GAgency_Name, Officer_Fname, Officer_Lname, App_Status FROM applications INNER JOIN student_applicant ON applications.Std_ID=student_applicant.Std_ID LEFT OUTER JOIN major ON applications.MajorID=major.MajorID LEFT OUTER JOIN admission_officer ON applications.OfficerID=admission_officer.OfficerID LEFT OUTER JOIN government_agency ON applications.GAgencyID=government_agency.GAgencyID WHERE Std_SAT >=".$nom." ORDER BY Std_SAT DESC";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "<br>". "Applications with SAT score of at least ".$nom.":"."<br>";
        while($rand = mysqli_fetch_assoc($result)){
          $resultset[]=$rand;
        }
        $htmls = "<table><tr><th>".implode('</th><th>',array_keys($resultset[0])).'</th></tr>';
        foreach($resultset as $set){
            $htmls .= "<tr><td>".implode('</td><td>',$set).'</td></tr>';
        }
        print $htmls.'</table>';
        echo "Number of rows retrieved: " . $result->num_rows . "<br><br>";} 
      else {echo "No results";}}

if(array_key_exists('runquery2', $_POST)) {
  $nom2 = $_POST['querybox2'];
  $sql2 = "SELECT ApplicationID, Std_FName, Std_LName,	Major_Name, Std_SAT, Std_HSgpa, Std_HSname, Std_EC, GAgency_Name, Officer_Fname, Officer_Lname, App_Status FROM applications INNER JOIN student_applicant ON applications.Std_ID=student_applicant.Std_ID LEFT OUTER JOIN major ON applications.MajorID=major.MajorID LEFT OUTER JOIN admission_officer ON applications.OfficerID=admission_officer.OfficerID LEFT OUTER JOIN government_agency ON applications.GAgencyID=government_agency.GAgencyID WHERE Std_HSgpa >=".$nom2." ORDER BY Std_HSgpa DESC";
  $result2 = mysqli_query($conn, $sql2);
  if ($result2->num_rows > 0) {
      echo "<br>". "Applications with GPA of at least ".$nom2.":"."<br>";
      while($rand2 = mysqli_fetch_assoc($result2)){
        $resultset2[]=$rand2;}
      $htmls2 = "<table><tr><th>".implode('</th><th>',array_keys($resultset2[0])).'</th></tr>';
      foreach($resultset2 as $set2){
          $htmls2 .= "<tr><td>".implode('</td><td>',$set2).'</td></tr>';}
      print $htmls2.'</table>';
      echo "Number of rows retrieved: " . $result2->num_rows . "<br><br>";} 
    else {echo "No results";}}

if(array_key_exists('runquery4', $_POST)) {
  $nom4 = $_POST['querybox4'];
  $sql4 = "SELECT ApplicationID, Std_FName, Std_LName,	Major_Name, Std_SAT, Std_HSgpa, Std_HSname, Std_EC, GAgency_Name, Officer_Fname, Officer_Lname, App_Status FROM applications INNER JOIN student_applicant ON applications.Std_ID=student_applicant.Std_ID LEFT OUTER JOIN major ON applications.MajorID=major.MajorID LEFT OUTER JOIN admission_officer ON applications.OfficerID=admission_officer.OfficerID LEFT OUTER JOIN government_agency ON applications.GAgencyID=government_agency.GAgencyID WHERE App_Status = '".$nom4."'";
  $result4 = mysqli_query($conn, $sql4);
  if ($result4->num_rows > 0) {
      echo "<br>".$nom4." Applications:"."<br>";
      while($rand4 = mysqli_fetch_assoc($result4)){
        $resultset4[]=$rand4;}
      $htmls4 = "<table><tr><th>".implode('</th><th>',array_keys($resultset4[0])).'</th></tr>';
      foreach($resultset4 as $set4){
          $htmls4 .= "<tr><td>".implode('</td><td>',$set4).'</td></tr>';}
      print $htmls4.'</table>';
      echo "Number of rows retrieved: " . $result4->num_rows . "<br><br>";} 
    else {echo "No results";}}

$sql3 = "SELECT ApplicationID, Std_FName, Std_LName,	Major_Name, Std_SAT, Std_HSgpa, Std_HSname, Std_EC, GAgency_Name, Officer_Fname, Officer_Lname, App_Status FROM applications INNER JOIN student_applicant ON applications.Std_ID=student_applicant.Std_ID LEFT OUTER JOIN major ON applications.MajorID=major.MajorID LEFT OUTER JOIN admission_officer ON applications.OfficerID=admission_officer.OfficerID LEFT OUTER JOIN government_agency ON applications.GAgencyID=government_agency.GAgencyID";
$result3 = mysqli_query($conn, $sql3);
if ($result3->num_rows > 0) {
    echo "<br><br>". "Full list of Applications:"."<br>";
    while($rand3 = mysqli_fetch_assoc($result3)){
        $resultset3[]=$rand3;}
    $htmls3 = "<table><tr><th>".implode('</th><th>',array_keys($resultset3[0])).'</th></tr>';
    foreach($resultset3 as $set3){
        $htmls3 .= "<tr><td>".implode('</td><td>',$set3).'</td></tr>';}
    print $htmls3.'</table>';
    echo "". "Number of rows retrieved: " . $result3->num_rows . "<br>";} 
else {echo "No results";}


// Close connection
mysqli_close($conn);
?>
<br>
<a href="newapplication.php">Click here to add new application</a>
<br><br>
<a href="updateapplication.php">Click here to update application record</a>
<br><br>
<a href="index.php">Click here to go back to Home</a>
</body>
</html>