<?php
    require("php/connect.php");
    $db = get_db();

    $queryCampaign = 'SELECT id,name FROM campaign';

    $stmtCampaign = $db->prepare($queryCampaign);
    $stmtCampaign->execute();
    $Campaigns = $stmtCampaign->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>  
        <title>View Campaign</title>
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

                $campID

                $sql = "SELECT * FROM campaignNotes WHERE USERID = '$userID';";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                  $campID = $row['CAMPAIGNID'];
                    }
                }else{echo "User Has not made a campaign";}

                $campName=$description=$meetTime="";

                $sql = "SELECT * FROM campaign WHERE ID = '$campID';";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $campname = $row['storyName'];
                        echo "<div class ='container' ><h1><a href='#'>" . $campName . "</a></h1>";
                        $description = $row['description'];
                        echo "<p>" . $description . "</p>";
                        $meetTime = $row['meetTime'];
                        echo "<h3>" . $description . "/n</h3>";

                    }
                }else{echo "User Has not made a campaign";}


        </div>

    </body>
</html>
