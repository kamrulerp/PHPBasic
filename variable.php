<?php
// session_start(); number_format($varInt, 2);
//  session_start();
//  $var = 'Kamrul';
//  $varInt = 12;
//  $varFloat = 12.5500005;

 //echo number_format($varInt, 2); 

//  $_GET['name'] = 'Kamrul,Robin'; 
//  $_GET['age'] = 12;
//  $_GET['email'] = 'kamrul@hasan.com';

//  $_POST['name'] = 'Kamrul,Robin';
//  $_POST['age'] = 12;

//  $_SESSION['name'] = 'Kamrul,Robin';
//  $_SESSION['age'] = 12;

//  echo $_SESSION['name'];
$sum = 0;

 $_POST['number1'];
    //echo '<br>';
 $_POST['number2'];

// $sum = $_POST['number1'] + $_POST['number2'];
// $sub = $_POST['number1'] - $_POST['number2'];
// $mul = $_POST['number1'] * $_POST['number2'];
// $div = $_POST['number1'] / $_POST['number2'];
// echo 'your input is: '.$_POST['number1'].'<br>'.'your input is: '.$_POST['number2'].'<br>';

// echo 'Sum is: '.$sum.'<br>'.'Sub is: '.$sub.'<br>'.'Mul is: '.$mul.'<br>'.'Div is: '.$div;

// number 1 even or odd ? 
$divisible = $_POST['number1'] % 2;
//  if($divisible==0)
//  {
//     echo 'Number 1 is even';
//  }else{
//     echo 'Number 1 is odd';
//  }



//  $a=5; $b=5;
//  // if(a>b)  if(a<b) if(a==b) if(a===b) if(a!=b) if(a>=b) if(a<=b)

//     if($a>$b){
//         echo 'a is greater than b';
//     }else if($a<$b){
//         echo 'a is less than b';
//     }else if($a==$b){
//         echo 'a is equal to b';
//     }else{
//         echo 'unknown';
//     }    

$a = $_POST['number1'];
$b = $_POST['number2'];
$c = $_POST['number3'];

if($a>$b)
{
    if($a>$c)
    {
        echo $a;
    }
}else if($b>$c)
{
    echo $b;
}else{
    echo $c;
}


if($a>$b && $a>$c)
{
    echo $a;

}else if($b>$c)
{
    echo $b;
}else{
    echo $c;
}


?>

<!DOCTYPE html>
<html lang="en">
<body>
    <form action="" method="POST">
        <input type="text" name="number1" value="" />
        <input type="text" name="number2" value=""/>
        <input type="text" name="number3" value="">
        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>
