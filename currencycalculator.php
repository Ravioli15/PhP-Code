<?php
$amount = 0;
if (isset($_POST['amounttoconvert'])) $amount = $_POST['amounttoconvert'];
$total = $amount * 1.17;
echo $total . " in euros";
?>