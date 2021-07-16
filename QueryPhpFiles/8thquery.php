<!DOCTYPE html>
<html lang="en">
<head>
    <title>SQL QUERY 8</title>
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
                        <th>Branch ID</th>
                        <th>Branch Address</th>
                        <th>Location</th>
                        <th>No of copies</th>
                        
                </tr>
                <?php 
                        $con = mysqli_connect('localhost', 'root', 'nameesha') or die(mysqli_error($con));
                        mysqli_select_db($con, 'library_db')  or die(mysqli_error($con));
                        $book_name = $_POST["book_name"];
                        $query = "SELECT BC.BRANCH_ID,LB.BRANCH_NAME,LB.ADDRESS,BC.NO_OF_COPIES FROM BOOK B,BOOK_COPIES BC,LIBRARY_BRANCH LB WHERE TITLE='$book_name' AND B.BOOK_ID = BC.BOOK_ID AND BC.BRANCH_ID = LB.BRANCH_ID";
                    
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        if ($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["BRANCH_ID"]."</td><td>".$row["BRANCH_NAME"]."</td><td>".$row["ADDRESS"]."</td><td>".$row["NO_OF_COPIES"]."</td></tr>";
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

