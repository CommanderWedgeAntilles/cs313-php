<?php
    require("php/connect.php");
    $db = get_db();

    $queryCharacters = 'SELECT * FROM Characters';

    $stmtCampaign = $db->prepare($queryCampaign);
    $stmtCampaign->execute();
    $Campaigns = $stmtCampaign->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>  
        <title>View Character</title>
        <link rel="stylesheet" type="text/css" href="css/create.css">
    </head>
    <body>
        <div class="top">
            <h1>Dungeon Manager</h1>
            <p>Keep track of your campaigns, characters, and more.</p>
        </div>
        <div class = "display">
            <?php
                $userID="";

                $sql = "SELECT * FROM users WHERE username = '$_SESSION['username']';";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                  $userID = $row['ID'];
                    }
                }else{echo "Invalid User";}

                $character="";
                $characterID="";


                $sql = "SELECT name FROM characters WHERE USERID = '$userID';";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $character = $row['name'];
                        echo "<div class='container' id='characterinfo'><h1><a href='#'>" . $character . "</a></hi>";
                        $characterID = $row['ID'];


                        $classID=$raceID="";

                        $sql = "SELECT * FROM charactersrace WHERE CHARACTERID = '$characterID';";
                        $result = mysqli_query($db, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                        $raceID = $row['RACEID'];
                            }
                        }else{echo "Invalid character";}

                        $sql = "SELECT * FROM charactersclass WHERE CHARACTERID = '$characterID';";
                        $result = mysqli_query($db, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                        $classID = $row['CLASSID'];
                            }
                        }else{echo "Invalid character";}

                        $racename=$racedescription=$racetrait=$classname=$classdescription=$classhit=$classability=$classsaves=""
                        
                        $sql = "SELECT * FROM race WHERE ID = '$raceID';";
                        $result = mysqli_query($db, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                        $racename = $row['name'];
                        echo "<h2>". $racename ."</h2>";
                        $racedescription= $row['description'];
                        echo "<p>". $racedescription ."</p>";
                        $racetrait= $row['raceTrait'];
                            }
                        }else{echo "Invalid Race";}

                        $sql = "SELECT * FROM class WHERE ID = '$classID';";
                        $result = mysqli_query($db, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                        $classname = $row['name'];
                        echo "<h2>". $classname ."</a></h2>";
                        $classdescription= $row['description'];
                        echo "<p>".$classdescription."\n</p></div>";
                        $classhit= $row['hitDie'];
                        $classability= $row['primAbility'];
                        $classsaves= $row['saves'];
                            }
                        }else{echo "Invalid Race";}
                        }
                    }else{echo "Invalid UserID or No Character Created.";}

                
            ?>

        </div>
    </body>
</html>