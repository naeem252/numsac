
<?php include "includes/header.php";?>

<?php

$query="SELECT * FROM active";
$send=mysqli_query($connection,$query);
$count=mysqli_num_rows($send);
echo $count;
?>