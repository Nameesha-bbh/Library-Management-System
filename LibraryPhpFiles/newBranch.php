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

        $branch_id = $_POST['branch_id'];
        $branch_name = $_POST['branch_name'];
        $branch_address = $_POST['branch_address'];
        $sql = "INSERT INTO LIBRARY_BRANCH (BRANCH_ID,BRANCH_NAME,ADDRESS) VALUES ($branch_id,'$branch_name','$branch_address')";

        if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
        echo "<br><a href='../index.html'>Click to go back</a>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>