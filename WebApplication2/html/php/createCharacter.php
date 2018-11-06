<?php
require ('connect.php');
$db = get_db();

$name = mysqli_real_escape_string($db, $_POST['charName']);
$age = mysqli_real_escape_string($db, $_POST['age']);
$gender = mysqli_real_escape_string($db, $_POST['gender']);
$race = mysqli_real_escape_string($db,$_POST['race'] );
$class = mysqli_real_escape_string($db, $_POST['class']);
$wealth =mysqli_real_escape_string($db, $_POST['wealth']);
$personality = mysqli_real_escape_string($db,$_POST['personality']);
$ideals = mysqli_real_escape_string($db, $_POST['ideals']);
$bonds = mysqli_real_escape_string($db, $_POST['bonds']);
$flaws = mysqli_real_escape_string($db, $_POST['flaws']);
$background = mysqli_real_escape_string($db, $_POST['background']);
$appearance = mysqli_real_escape_string($db, $_POST['appearance']);

if(($name != NULL )&&($race !=NULL)&&($class!=NULL)){
    
    $userID="";

    $sql = "SELECT * FROM users WHERE username = '$_SESSION['username']';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
      $userID = $row['ID'];
        }
    }else{echo "Invalid User";}
    
    $sql = "INSERT INTO characters(USERID,name,age,gender, personalityTraits,ideals,bonds,flaws,background,appearance, wealth) VALUES('$userID','$name', '$age', '$gender', '$personality','$ideals','$bonds','$flaws','$background','$appearance', '$wealth');";
    mysqli_query($db, $sql);
    
    $raceID=$characterID=$classID="";

    $sql = "SELECT * FROM race WHERE name = '$race';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $raceID = $row['ID'];
        }
    }else{echo "Invalid Race";}

    $sql = "SELECT * FROM class WHERE name = '$class';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
      $classID = $row['ID'];
        }
    }else{echo "Invalid Class";}

    $sql = "SELECT * FROM users WHERE name = '$_SESSION['username']';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
      $userID = $row['ID'];
        }
    }else{echo "Invalid User";}

    $sql = "SELECT * FROM characters WHERE name = '$name';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
      $characterID = $row['ID'];
        }
    }else{echo "Invalid Character";}

    //foreign key tables

    $sql = "INSERT INTO charactersrace(CHARACTERID, RACEID) VALUES ('$characterID','$raceID');";
    mysqli_query($db, $sql);

    $sql = "INSERT INTO charactersclass(CHARACTERID, CLASSID) VALUES ('$characterID','$classID');";
    mysqli_query($db, $sql);

    $sql = "INSERT INTO usercharacters(USERID, CHARACTERID) VALUES ('$userID','$characterID');";
    mysqli_query($db, $sql);



    header("Location: /cs313-php/WebApplication2/html/dndHome.html");

}else{
    echo "A Character Requires a Name, Race, and Class";
}


?>