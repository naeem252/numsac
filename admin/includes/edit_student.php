<?php

if(isset($_GET['edit_id'])){
    $edit_id=$_GET['edit_id'];

    $query="SELECT * FROM students WHERE id=$edit_id";
    $query_result=mysqli_query($connection,$query);
    confirm_query($query_result);
    $query_result=mysqli_fetch_assoc($query_result);

    $default_img=$query_result['image'];
}


if(isset($_POST['edit_student'])){
    $class=$_POST['class'];
    $roll=$_POST['roll'];
    $address=$_POST['address'];
    $image=$_FILES['image']['name'];
    $image_temp=$_FILES['image']['tmp_name'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];

    if(empty($image)){
        $image=$default_img;
    }


    move_uploaded_file($image_temp,"images/".$image);

    $query="UPDATE students SET roll='$roll', phone=$phone, address='address', image='$image', gender='$gender' ";
    $query.="WHERE id=$edit_id";
    $send_query=mysqli_query($connection,$query);

    confirm_query($send_query);

    go('students.php');

}




?>

<div class="edit-content">
    <div class="container">

        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <h1 class="display-4">Edit Student</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto mt-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="number" class="form-control" name="class" value="<?= $query_result['class'];?>">
                    </div>
                    <div class="form-group">
                        <label for="role">Image <img width="100" src="images/<?php echo $query_result['image'];?>" alt=""></label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="<?= $query_result['address'];?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?= $query_result['phone'];?>">
                    </div>
                    <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="text" class="form-control" name="roll" value="<?= $query_result['roll'];?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="" class="form-control">
                            <option value="male" <?php echo  $query_result['gender'] == 'male' ?? 'selected'; ?>>Male</option>
                            <option value="female" <?php echo  $query_result['gender'] == 'female' ??  'selected'; ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="edit_student" value="Edit student">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>