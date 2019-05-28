<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php
if(isset($_GET['show'])){
    $show_page=$_GET['show'];
}else{
    $show_page='';
}
?>


<?php

switch ($show_page){
    case "edit_teacher":
        include "includes/edit_teacher.php";
        break;
    case "add_teacher":
        include "includes/edit_teacher.php";
        break;
    default:
        include "includes/view_all_teachers.php";
}


?>


<?php include "includes/footer.php"; ?>
