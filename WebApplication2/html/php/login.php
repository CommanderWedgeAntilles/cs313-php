<?php
require("php/connect.php");
$db = get_db();

$username = $password = $usn = $psw ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["uname"]);
    $password = test_input($_POST["pws"]);
  }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//check the username vs the one saved.
  $sql = "SELECT username, password FROM users WHERE username = '$username';";
  $result = mysqli_query($db,$sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
      $usn = $row['username'];
      $psw = $row['password'];
    }
    if($psw == $password){
      $_SESSION['username'] ='$username';
      header('Location: /cs313-php/WebApplication2/html/dndHome.html');
    }else{echo "Incorrect Password";}
  }else{echo "Username Does Not Exist.";}
?>