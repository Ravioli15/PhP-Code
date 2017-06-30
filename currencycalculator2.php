<?php
$amount = 0;
$convertTo = "";

if (isset($_POST['amounttoconvert'])) $amount = $_POST['amounttoconvert'];
if (isset($_POST['currency'])) $convertTo = $_POST['currency'];

if ($convertTo=="euros")
{
	$total = $amount * 1.17;
}
elseif ($convertTo=="dollars")
{
	$total = $amount * 1.25;
}
else	
{
	$total = $amount * 24.81;
}

echo $total . " in " . $convertTo;
echo "<br/>";
echo "$total in $convertTo";
?>