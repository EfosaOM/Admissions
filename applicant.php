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
<h3>Applicants</h3>

<form method = "post">
  <textarea id="querybox" name="querybox" placeholder="Search by Last Name here..." style="height:50px"></textarea><br>
  <input type="submit" name = "runquery" value="Search">
  <input type="submit" value="Clear" onclick="javascript:eraseText();">
</form>

<script>
function eraseText() {
    document.getElementById("querybox").value = "";
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
    die("Connection failed: " . mysqli_connect_error());
}

if(array_key_exists('runquery', $_POST)) {
    $nom = $_POST['querybox'];

    $sql = "SELECT * FROM student_applicant WHERE Std_Lname LIKE '%".$nom."%'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while($rand = mysqli_fetch_assoc($result)){
          $resultset[]=$rand;
        }
        $htmls = "<table><tr><th>".implode('</th><th>',array_keys($resultset[0])).'</th></tr>';
        foreach($resultset as $set){
            $htmls .= "<tr><td>".implode('</td><td>',$set).'</td></tr>';
        }
        print $htmls.'</table>';
        echo "Number of rows retrieved: " . $result->num_rows . "<br><br>";} 
    else {echo "No results";}  
}

$sqls = "SELECT * FROM student_applicant";
$results = mysqli_query($conn, $sqls);
if ($results->num_rows > 0) {
    echo "<br><br>". "Full list of Applicants:"."<br>";
    while($rands = mysqli_fetch_assoc($results)){
        $resultsets[]=$rands;
    }
    $htmls = "<table><tr><th>".implode('</th><th>',array_keys($resultsets[0])).'</th></tr>';
    foreach($resultsets as $sets){
        $htmls .= "<tr><td>".implode('</td><td>',$sets).'</td></tr>';
    }
    print $htmls.'</table>';
    echo "". "Number of rows retrieved: " . $results->num_rows . "<br>";} 
else {echo "No results";}


// Close connection
mysqli_close($conn);
?>

<br><br>
<!-- tag before the code and a <a href="updateapplicant.php">Click here to update applicant record</a>
<br><br>-->
<a href="index.php">Click here to go back to Home</a>
</body>
</html>