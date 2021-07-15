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
        $date = date('Y-m-d');
        $sql = "SELECT DATEDIFF('$date',DUE_DATE) FROM BOOK_LENDING WHERE CARD_NO=$card AND BOOK_ID=$bID AND BRANCH_ID=$brID";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if($row["DATEDIFF('$date',DUE_DATE)"] > 0){
              echo "You returned the book after  ". $row["DATEDIFF('$date',DUE_DATE)"] ."  days from the due date.So you need to pay Rs." . $row["DATEDIFF('$date',DUE_DATE)"]*2 . " fine";
          }
            else{
                echo "The book has been successfully returned within the due date<br>";
                
            }
          }
        }
        $sql = "DELETE FROM BOOK_LENDING WHERE CARD_NO=$card AND BOOK_ID=$bID AND BRANCH_ID=$brID";
        $result = $conn->query($sql);
        echo "<a href='index.html'>Click to go back</a>";

        $conn->close();
?>