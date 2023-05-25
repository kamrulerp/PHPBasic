<?php
include 'dbConnection.php';

$sql = "SELECT * FROM students";
$query = $conn->query($sql);
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th,td{
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        th{
            background-color: #4CAF50;
            color: white;
        }
         


</style>
<body>
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Date of birth</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
         while($row = $query->fetch_object()){ ?>    
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row->student_id;?></td>
                <td><?php echo $row->student_name;?></td>
                <td><?php echo $row->fathersName;?></td>
                <td><?php echo $row->mothersName;?></td>
                <td><?php echo date('d-m-y', strtotime($row->dob));?></td>
                <td>
                    <a href="informationInput.php?id=<?php echo $row->student_id;?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row->student_id;?>">Delete</a>
                </td>    
            </tr>
        <?php } ?>    
        </tbody>
    </table>
    
</body>
</html>
