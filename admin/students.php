<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


<?php

if(isset($_GET['show'])){
    $show=$_GET['show'];
}else{
    $show='';
}

switch ($show){
    case "edit_student":
        include "includes/edit_student.php";
        break;
    case "add_student":
        include "includes/add_student.php";
        break;
    default:
        include "includes/view_all_students.php";
}






?>



<?php include "includes/footer.php"; ?>