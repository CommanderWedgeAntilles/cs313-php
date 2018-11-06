<?php
    require("php/connect.php");
    $db = get_db();

    $queryRace = 'SELECT id,name FROM race';
    $queryClass = 'SELECT id,name FROM class';

    $stmtRace = $db->prepare($queryRace);
    $stmtRace->execute();
    $races = $stmtRace->fetchAll(PDO::FETCH_ASSOC);

    $stmtClass = $db->prepare($queryClass);
    $stmtClass->execute();
    $classes = $stmtClass->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>  
        <title>Create Character</title>
        <link rel="stylesheet" type="text/css" href="css/create.css">
    </head>
    <body>
        <div class="top">
            <h1>Dungeon Manager</h1>
            <p>Keep track of your campaigns, characters, and more.</p>
        </div>
        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" action="php/createCharacter.php">
            <div class="container" id="createChar">
                <div class="container" id="halfscreen">
                    <label for="charName">Character Name:</label><br>
                    <input type="text" name="charName" placeholder="Enter Character's Name" required><br>
                    
                    <label for="age">Age:</label><br>
                    <input type="number" name="age"placeholder="Enter Age"><br>
                
                    <label for="gender">Gender:</label><br>
                    <input type="text" name="gender"placeholder="Enter Gender"><br>
                    
                    <label for="race">Race:</label><br>
                    <select name="race" placeholder="Select Race">
                        <option value="" selected disabled hidden>Select Character's Race</option>
                        <?php
                            foreach($races as $race) {
                                $id = $race['ID'];
                                $name = $race['name'];
                                /*$description = $race['description'];*/
                                echo "<option value='$name'>'$name'</option>/n";
                                /*send ID to table if selected*/

                            }
                        ?>
                        <option value="Dragonborn">Dragonborn</option>
                        <option value="Drow">Drow</option>
                        <option value="Dwarf">Dwarf</option>
                        <option value="Elf">Elf</option>
                        <option value="Gnome">Gnome</option>
                        <option value="Halfling">Halfling</option>
                        <option value="Half-Orc">Half-Orc</option>
                        <option value="Human">Human</option>
                        <option value="Tiefling">Tiefling</option>
                    </select><br>

                    <label for="class">Class:</label><br>
                    <select name="class" placeholder="Enter Class">
                        <option value="" selected disabled hidden>Select a Class Here</option>
                        <?php
                            foreach($races as $race) {
                                $id = $class['ID'];
                                $name = $class['name'];
                                /*$description = $class['description'];*/
                                echo "<option value='$name'>'$name'</option>/n";
                                /*send ID to table if selected*/
                            }
                        ?>
                        <option value="Barbarian">Barbarian</option>
                        <option value="Bard">Bard</option>
                        <option value="Cleric">Cleric</option>
                        <option value="Druid">Druid</option>
                        <option value="Fighter">Fighter</option>
                        <option value="Monk">Monk</option>
                        <option value="Paladin">Paladin</option>
                        <option value="Ranger">Ranger</option>
                        <option value="Rogue">Rogue</option>
                        <option value="Sorceror">Sorceror</option>
                        <option value="Warlock">Warlock</option>
                        <option value="Wizard">Wizard</option>
                    </select><br>
                    
                    <label for="wealth">Gold:</label><br>
                    <input type="number" name="wealth"placeholder="Enter Wealth in Gold Coins"><br>
                </div>
                <div class="container" id="imagebox">
                    <img src="#" alt="character creator">
                </div>
    
                <label for="personality">Personality Traits:</label><br>
                <textarea name="personality" id="personality" placeholder="Write about your character's personality here."></textarea>
                <br>
                <label for="ideals">Ideals:</label><br>
                <textarea name="ideals" id="ideals" placeholder="Write about your character's ideals here."></textarea>
                <br>
                <label for="bonds">Bonds:</label><br>
                <textarea name="bonds" placeholder="Write about your character's family, friends, and enemies here."></textarea>
                <br>
                <label for="flaws">Flaws:</label><br>
                <textarea name="flaws" placeholder="Write about your character's flaws here."></textarea>
                <br>
                <label for="background">Background:</label><br>
                <textarea name="background" placeholder="Write about your character's history here."></textarea>
                <br>
                <label for="appearance">Appearance:</label><br>
                <textarea name="appearance" placeholder="Write about your character's appearance here."></textarea>
                <br>
                <button type="submit" action="php/createCharacter.php">Create Character</button>
                <button type="submit" action="<?php if (isset($_POST['cancel'])); ?>">Cancel</button>
            </div>
        </form>

    </body>
</html>