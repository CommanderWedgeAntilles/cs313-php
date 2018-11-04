<?php

$username = $password ="";

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
  
?>