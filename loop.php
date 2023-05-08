<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>
<?php
  //isset()
  // for loop, while loop, foreach loop
  // $i++ ++$i

 // 1 to 10 print. divisible by 5 
   // 1 No
   // 2 No
    // 3 No
    // 4 No
    // 5 Yes
    // 6 No
    // 7 No
    // 8 No
    // 9 No
    // 10 Yes 
  if(isset($_POST['submit'])){

     $_POST['valueOfNstart'];
     $_POST['valueOfNend'];
     $_POST['divisibleBy'];

     for($i=$_POST['valueOfNstart']; $i<=$_POST['valueOfNend']; $i++){
        if($i==6){
            continue;
        }

        echo $i.'<br>';
        
     }
          
  } 
  
  

//   $i=0;
//   while($i<10){
//     echo $i.'<br>';
//     ++$i;
//   }

?>
<form action="" method="post">
    <input type="text" name="valueOfNstart" value="">
    <input type="text" name="valueOfNend" value="">
    <input type="text" name="divisibleBy"  value="">
    <button type="submit" name="submit">Submit</button>
</form>
</p>
</body>
</html>