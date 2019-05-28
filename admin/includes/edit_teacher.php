<?php

if(isset($_GET['edit_id'])){
    $edit_id=$_GET['edit_id'];

    $query="SELECT * FROM teachers WHERE id=$edit_id";
    $query_result=mysqli_query($connection,$query);
    $query_result=mysqli_fetch_assoc($query_result);
}


if(isset($_POST['edit_teacher'])){
    $teacher_role=$_POST['teacher_role'];
    $teacher_number=$_POST['teacher_number'];
    $teacher_address=$_POST['teacher_address'];

$query="UPDATE teachers SET role='$teacher_role', phone=$teacher_number, address='$teacher_address' ";
$query.="WHERE id=$edit_id";
$send_query=mysqli_query($connection,$query);

confirm_query($send_query);

go('teachers.php');

}




?>

<div class="edit-content">
    <div class="container">

        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <h1 class="display-4">Edit Teacher</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto mt-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="phone">Teacher Phone Number</label>
                        <input type="text" class="form-control" name="teacher_number" value="<?= $query_result['phone'];?>">
                    </div>
                    <div class="form-group">
                        <label for="role">Teacher Role</label>
                        <input type="text" class="form-control" name="teacher_role" value="<?= $query_result['role'];?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Teacher Address</label>
                        <input type="text" class="form-control" name="teacher_address" value="<?= $query_result['address'];?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="edit_teacher" value="Edit Teacher">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>