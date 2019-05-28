<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>


<?php
$username=$_SESSION['username'];
$query="DELETE FROM active WHERE user_name='$username' LIMIT 1";
$sent=mysqli_query($connection,$query);

unset($_SESSION['username']);

go('index.php');

?>


<?php include "includes/footer.php";?>
