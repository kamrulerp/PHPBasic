<?php
include_once "dbConnection.php";
$mgs = "";


if(isset($_POST['submit'])){

    $student_name = $_POST['student_name'];
    $fathersName = $_POST['fathersName'];
    $mothersName = $_POST['mothersName'];
    $dob = $_POST['dob'];

    $sql = "INSERT INTO `students`( `student_name`, `fathersName`,
     `mothersName`, `dob`)
      VALUES ('".$student_name."','".$fathersName."','".$mothersName."',
      '".$dob."')";

    $query = $conn->query($sql);  
    if($query){
        $mgs =  "Data inserted successfully";
    }else{
        $mgs =  "Data not inserted";
    }
}

if(isset($_POST['update'])){
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $fathersName = $_POST['fathersName'];
    $mothersName = $_POST['mothersName'];
    $dob = $_POST['dob'];

    $updateQl ="UPDATE `students` SET `student_name`='".$student_name."',
    `fathersName`='".$fathersName."',`mothersName`='".$mothersName."',
    `dob`='".$dob."' WHERE student_id='".$student_id."'";

    $query = $conn->query($updateQl);

    if($query){
        $mgs =  "Data updated successfully";
    }else{
        $mgs =  "Data not updated";
    }
}


if(isset($_GET['id'])){
    $student_id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE student_id='".$student_id."' ";
    $query = $conn->query($sql);
    $row = $query->fetch_object();
}
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
    div {
        width: 500px;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 20px;
    }
    input{
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }
    input[type="submit"]{
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
</style>
<body>
    <div>
        <h3>Inser your information</h3>
        <span><?php echo $mgs;?></span>
        
        <a href="dataView.php">Go Back</a>

        <form action="" method="post">
            <label for="">Student ID</label>
            <input readonly type="text" name="student_id" value="<?php echo $row->student_id;?>" >
            <label for="">Student Name</label>
            <input type="text" name="student_name" value="<?php echo $row->student_name;?>" >
            <label for="">Father Name</label>
            <input type="text" name="fathersName" value="<?php echo $row->fathersName;?>" >
            <label for="">Mother Name</label>
            <input type="text" name="mothersName" value="<?php echo $row->mothersName;?>" >
            <label for="">Date of birth</label>
            <input type="date" name="dob" value="<?php echo $row->dob;?>" >
          <?php if(isset($_GET['id'])){?>  
            <input type="submit" name="update" value="Update">
          <?php }else{?>
            <input type="submit" name="submit" value="Submit">
          <?php }?> 
        </form>
    </div>
</body>
</html>