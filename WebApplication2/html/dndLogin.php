<?php
require(require ('connect.php');)
$db = get_db();
?>
<!DOCTYPE html>
<html>
    <head>  
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <div class="top">
            <h1>Dungeon Manager</h1>
            <p>Keep track of your campaigns, characters, and more.</p>
        </div>
        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
            
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            
                <button type="submit" action="php/login.php">Login</button>
            </div>
        </form>
        <div class="container"><button><a href="dndNewUser.html">Register New User</a></button></div>
        

    </body>
</html> 