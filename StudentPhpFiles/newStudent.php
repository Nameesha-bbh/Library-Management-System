<?php
        $servername = "localhost";
        $username = "root";
        $password = "nameesha";
        $dbname = "library_db_copy";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $card = $_POST['cardNo'];
        $name = $_POST['name']; 
        $sql = "INSERT INTO CARD (CARD_NO,STUD_NAME) VALUES ($card,'$name')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<br><a href='../index.html'>Click to go back</a>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>