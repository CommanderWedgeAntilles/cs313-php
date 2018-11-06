<!DOCTYPE html>
<html>
    <head>  
        <title>Create User</title>
        <link rel="stylesheet" type="text/css" href="css/create.css">
    </head>
    <body>
        <div class="top">
            <h1>Dungeon Manager</h1>
            <p>Keep track of your campaigns, characters, and more.</p>
        </div>
        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="container" id="create">
                
                <label for="campaignName" ><b>Campaign Name:</b></label>
                <input type="text" placeholder="Enter Campaign Name" name="campaignName" id="campName" required>
                
                <label for="meeting"><b>Meeting Time:</b></label>
                <input type="datetime" placeholder="Enter Meeting Time" name="meeting" id="meeting">
                
                <label for="description"><b>Campaign Summary:</b></label>
                <textarea  placeholder="Enter a brief description of the campaign's background." name="description" id="description"></textarea>
            
                <button type="submit" action="php/createCampaign.php">Create User</button>
                <button type="submit" action="<?php if (isset($_POST['cancel'])); ?>">Cancel</button>
            </div>
        </form>
    </body>
</html>