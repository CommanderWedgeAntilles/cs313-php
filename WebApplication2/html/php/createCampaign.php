<?php
require ('connect.php');
$db = get_db();

$name = mysqli_real_escape_string($db, $_POST['campaignName']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$meeting = mysqli_real_escape_string($db, $_POST['meeting']);

if(name != NULL){

    $sql = "INSERT INTO campaign(storyName, description, meetTime) VALUES ('$name', '$description', '$meeting');";
    mysqli_query($db, $sql);
    header("Location: /cs313-php/WebApplication2/html/dndHome.html");

}else{
    echo "A Campaign Requires a Name.";
}