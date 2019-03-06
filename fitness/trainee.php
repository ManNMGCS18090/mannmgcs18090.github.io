<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'traineedb';

//opening a connetion
$conn = new mysqli ($hostname, $username, $password, $database);

if ($conn->connect_error) {
  die($conn->connect_error);
}
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if(isset($_POST['grpfit'])) $grpfit = true; else $grpfit = false;
if(isset($_POST['prtrain'])) $prtrain = true; else $prtrain = false;
if(isset($_POST['nutr'])) $nutr = true; else $nutr = false;

$reference = $_POST['reference'];
$questions = $_POST['questions'];

$query = "INSERT INTO trainee(fName, lName, email, phone, grpfit,prtrain, nutr, question, reference) value('$fName','$lName','$email','$phone','$grpfit','$prtrain','$nutr','$questions','$reference')";

$result = $conn->query($query);
echo "string";
if (!$result){
  echo "Insert failed";
}
else {
echo "Insert successfully"."<br/>";
}

$query = "select * from trainee";
$result = $conn->query($query);

if (!$result){
  echo "select error";
}

while($row = mysqli_fetch_array($result)){
  echo $row['ID']." ".$row['FName']." ".$row['LName']." ".$row['Email']." ".$row['Phone']."<br/>";
}

?>
