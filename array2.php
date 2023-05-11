<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if(isset($_POST['submit'])){
            //var_dump($_POST);
            $m = $_POST['m'];
            for($i=0; $i<$m; $i++){
               $sum = $sum + $_POST['num'.$i];     
            }
            //$sum = $_POST['num0'];
            echo $sum;
        }
    ?>
    
    <form action="" method="post">
        <input type="number" name="n" >
        <button name="sub" type="submit">Submit</button>
    </form>
    <form action="" method="post">
        <?php
            if(isset($_POST['sub'])){
            $n = $_POST['n']; 
            
            for($i=0; $i<$n; $i++){
        ?>
    
        <input type="number" name="num<?php echo $i;?>" />
            
        <?php
            } }
        ?>
      <input type="number" name="m" value="<?php echo $n;?>">  
      <button type="submit" name="submit">Submit</button>
    </form>
    
    
</body>
</html>