<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $servername = "db";
        $username = "myuser";
        $password = "mypassword";
        $database = "myapp_db";

        $conn = new mysqli($servername, $username, $password, $database);

        if($conn -> connect_error){
            die("Connessione fallita: " . $conn_error);
        }

        $q = "INSERT INTO utenti (nome, email) VALUES ('" . $_POST['name'] . "', ' " . $_POST['email'] . "')";

        if($conn->query($q)){
            echo "Eseguita con successo";
            $conn->close();
        }else{
            echo "ERRORE!";
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Nome e Cognome:</label>
        <input type="text" name="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <input type="submit" value="Inserisci">
    </form>
    <div id="users">
        <?php
        
            $servername = "db";
            $username = "myuser";
            $password = "mypassword";
            $database = "myapp_db";
            
            $conn = new mysqli($servername, $username, $password, $database);

            if($conn -> connect_error){
                die("Connessione fallita: " . $conn->connect_error);
            }

            $q= "SELECT * FROM utenti";

            echo $q;

            $results = $conn->query($q);

            $row = $results->fetch_array(MYSQLI_ASSOC);
            print_r($row);
            

        ?>
    </div>
</body>
</html>