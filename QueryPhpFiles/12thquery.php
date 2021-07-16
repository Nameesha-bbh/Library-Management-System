<!DOCTYPE html>
<html lang="en">
<head>
    <title>SQL QUERY 12</title>
    <style>
            #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            }
    </style>
</head>
<body>
        <table id="customers">
                <tr>
                        <th>Card No</th>
                        <th>Student Name</th>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Branch ID</th>
                </tr>
                <?php 
                        $con = mysqli_connect('localhost', 'root', 'nameesha') or die(mysqli_error($con));
                        mysqli_select_db($con, 'library_db')  or die(mysqli_error($con));
                        $card = $_POST["card_no"];
                        $query = "SELECT C.CARD_NO,C.STUD_NAME,B.BOOK_ID,B.TITLE,BL.BRANCH_ID FROM BOOK B,BOOK_LENDING BL,CARD C,LIBRARY_BRANCH LB WHERE B.BOOK_ID=BL.BOOK_ID AND LB.BRANCH_ID = BL.BRANCH_ID AND C.CARD_NO=BL.CARD_NO AND C.CARD_NO=$card;
                        ";
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        if ($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["CARD_NO"]."</td><td>".$row["STUD_NAME"]."</td><td>".$row["BOOK_ID"]."</td><td>".$row["TITLE"]."</td><td>".$row["BRANCH_ID"]."</td></tr>";
                            }
                        }
                        else{
                            echo "NO DATA";
                        }
  
                        
                ?>
        </table>
        <br>
        <p><a href="../query.html">Click</a> to go back to query section</p>
</body>
</html>

