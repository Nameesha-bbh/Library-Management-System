<!DOCTYPE html>
<html lang="en">
<head>
    <title>SQL QUERY 5</title>
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
                        <th>Book ID</th>
                        <th>Branch ID</th>
                        <th>Card No</th>
                        <th>Student Name</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                </tr>
                <?php 
                        $con = mysqli_connect('localhost', 'root', 'nameesha') or die(mysqli_error($con));
                        mysqli_select_db($con, 'library_db')  or die(mysqli_error($con));
                        $query = "Select B.BOOK_ID,B.BRANCH_ID,B.CARD_NO,C.STUD_NAME,B.DATE_OUT,B.DUE_DATE from BOOK_LENDING B,CARD C WHERE B.CARD_NO=C.CARD_NO";
                        
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        if ($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["BOOK_ID"]."</td><td>".$row["BRANCH_ID"]."</td><td>".$row["CARD_NO"]."</td><td>".$row["STUD_NAME"]."</td><td>".$row["DATE_OUT"]."</td><td>".$row["DUE_DATE"]."</td></tr>";
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

