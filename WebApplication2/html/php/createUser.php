<?php
    require ('connect.php');
    $db = get_db();

    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $password = mysqli_real_escape_string($db, $_POST['psw']);

    $sql = "INSERT INTO users(username, password) VALUES ($username, $password)";
    mysqli_query($db, $sql);

    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: /cs313-php/WebApplication2/html/dndLogin.php');

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
    $db->close();
?>  