<!DOCTYPE html>
<html lang="en">
<head>
    <title>SQL QUERY</title>
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
                        <th>Book Title</th>
                        <th>Publisher Name</th>
                        <th>Publisher Year</th>
                        <th>Author Name</th>
                        <th>No of copies</th>
                        <th>Branch ID</th>
                </tr>
                <?php 
                        $con = mysqli_connect('localhost', 'root', 'nameesha') or die(mysqli_error($con));
                        mysqli_select_db($con, 'library_db')  or die(mysqli_error($con));
                        $query = "SELECT B.BOOK_ID,B.TITLE,B.PUBLISHER_NAME,A.AUTHOR_NAME,C.NO_OF_COPIES,L.BRANCH_ID FROM BOOK B,BOOK_AUTHORS A,BOOK_COPIES C,LIBRARY_BRANCH L WHERE B.BOOK_ID=A.BOOK_ID AND B.BOOK_ID=C.BOOK_ID AND L.BRANCH_ID=C.BRANCH_ID;
                        "; 
                        
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        if ($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["BOOK_ID"]."</td><td>".$row["TITLE"]."</td><td>".$row["PUBLISHER_NAME"]."</td><td>".$row["AUTHOR_NAME"]."</td><td>".$row["NO_OF_COPIES"]."</td><td>".$row["BRANCH_ID"]."</TD></tr>";
                            }
                        }
                        else{
                            echo "NO DATA";
                        }
                ?>
        </table>
</body>
</html>

