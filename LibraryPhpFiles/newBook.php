<?php
        $servername = "localhost";
        $username = "root";
        $password = "nameesha";
        $dbname = "library_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $book_id = $_POST['book_id'];
        $book_name = $_POST['book_name'];
        $author_name = $_POST['author_name'];
        $noc = $_POST['no_of_copies'];
        $pub_name = $_POST['publisher_name'];
        $ph_no = $_POST['phone_no'];
        $address = $_POST['address'];
        $branch_id = $_POST['branch_id'];
        $py = $_POST['pub_year'];

        $confirm = "select true from publisher where name='$pub_name'";
        $resultC = $conn->query($confirm);
        if ($resultC->num_rows > 0){
                echo "";

        }
        else{
                $sql = "INSERT INTO `PUBLISHER` (`NAME`,`PHONE`,`ADDRESS`) VALUES ('$pub_name',$ph_no,'$address');";
                $result = $conn->query($sql);
        }
        

        $sql1 = "INSERT INTO BOOK (BOOK_ID,TITLE,pub_year,PUBLISHER_NAME) VALUES ($book_id,'$book_name','$py','$pub_name')";
        $result1 = $conn->query($sql1);
        
        $sql2 = "INSERT INTO BOOK_AUTHORS (AUTHOR_NAME,BOOK_ID) VALUES('$author_name',$book_id)";
        $result2 = $conn->query($sql2);
        
        $sql3 = "INSERT INTO BOOK_COPIES (NO_OF_COPIES,BOOK_ID,BRANCH_ID) VALUES($noc,$book_id,$branch_id);";
        $result3 = $conn->query($sql3);
        if($result1 === TRUE && $result2 === TRUE && $result3 === TRUE ){
                echo "Insertion successful <br>";
                echo "<br><a href='../index.html'>Click to go back</a>";
        }
       
        $conn->close();
?>