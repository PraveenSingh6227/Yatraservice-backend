<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


$host = "localhost";
  $db_name = "wholly_test";
   $username = "wholly_test";
   $password = "hhtgfv@@$75767";
   
  $conn = mysqli_connect($host,$username,$password,$db_name);
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};



if ($_SERVER['REQUEST_METHOD'] === "POST") {



 $username = $_POST['username'];
  $password = $_POST['password'];
    $sql = "SELECT * FROM login where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $no = mysqli_num_rows($result);
}
?>
<?php if ($no>0) { ?>
{
  "status": "success",
  "message": "you are login sucessfully",
  "stat": "1",
  "user_id": "<?php echo $user_id ?>",
  "user_name": "<?php echo $user_name ?>",
  "user_email": "<?php echo $user_email ?>",
  "user_phone": "<?php echo $user_phone ?>"
}
<?php } else { ?>
 {
  "status": "Fail",
  "message": "you are Not login ",
  "stat": "0"
} 
<?php } ?>
  

 