<h1><?php echo "practice"?></h1>
<?php
$name ="harsh";
echo "my name is $name<br>". strrev($name);
?>

<?php echo "welcome to assosiative array in php";

$fevcol =array('harsh'=> 'red','samaksh'=>'blue',
'ajay'=>'purple', 'pranav'=>'black');

foreach ($fevcol as $key => $value){
    echo "<br>favourite colour of $key is $value";
}

?><?php
$naam = "samaksh";
echo "mera naam $naam hai <br>". strrev($naam).strlen($naam);  
?>