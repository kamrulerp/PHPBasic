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
// array 
//$array = array();
$j = 0;
$k = 0;
$l = 0;
$array = array(10, 25, 50, 45, 56, 64, 0, 82, 94, 100, 20);
//echo $array[5]; // 1
for($i=0; $i<sizeof($array); $i++){
    
    if($array[$i]==0){ $l++; continue;  }
    if($array[$i] % 2 == 0){
        //echo $array[$i]."<br>";
        $j++;
    }else{
        $k++;
    }
}
echo 'sum of Even number is:'.$j.' sum of odd number '.$k;
echo '<br>'.($i);



/// variable session, post, get
// if, else if
// loop while, for
// array

/// String
/// function

/// sql
?>







    </p>
</body>
</html>