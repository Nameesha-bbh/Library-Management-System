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
        $bID = $_POST['bId'];
        $brID = $_POST['brID']; 
        $issue = date('Y-m-d');
        $sql = "INSERT INTO BOOK_LENDING (DATE_OUT,DUE_DATE,BOOK_ID,BRANCH_ID,CARD_NO) VALUES ('$issue',ADDDATE('$issue',INTERVAL 14 DAY),$bID,$brID,$card)";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully<br>";
        echo "<a href='index.html'>Click to go back</a>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>