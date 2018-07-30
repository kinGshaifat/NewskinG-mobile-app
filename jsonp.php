<?php
$con=mysqli_connect("localhost","root","","news");

$arr=array();
$sel="SELECT * FROM news";
$rs=$con->query($sel);
while($row=$rs->fetch_assoc())
{
   $arr[]=$row;
}

echo $_REQUEST['callback'].'('.json_encode($arr).');'
?>