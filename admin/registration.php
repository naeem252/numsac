<?php ob_start()?>
<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>


<?php
if(isset($_POST['submit'])){
    $full_name=$_POST['full_name'];
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $teacherorstudent=$_POST['teacherorstudent'];
    $r_array=['full_name'=>$full_name,'email'=>$email,'pass'=>$password,'user_name'=>$user_name];

    $error=validate_registration($r_array);

    if(empty($error)){
        if($teacherorstudent==='student'){
            $roll=$_POST['roll'];
            $query="INSERT INTO users_student(full_name,user_name,email,password,roll) ";
            $query.="VALUES ('$full_name','$user_name','$email',$password,$roll)";
            $send_query=mysqli_query($connection,$query);
            confirm_query($send_query);


        }else{
            $query=mysqli_prepare($connection,"INSERT INTO users_teacher (full_name,user_name,email,password) VALUES(?, ?, ?, ?)");
            mysqli_stmt_bind_param($query,'sssi',$full_name,$user_name,$email,$password);

            mysqli_stmt_execute($query);
            confirm_query($query);
        }
        mysqli_stmt_close($query);
        go('index.php');
    }
}


?>


<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <form action="" method="post">
                <div class="form-group">
                    <label for="full_name">Full Name <span class="text-danger"><?php echo $error['full_name'] ?? " " ;?></span></label>
                    <input type="text" name="full_name" class="form-control" value="<?php echo $full_name ?? ""; ?>">
                </div>
                <div class="form-group">
                    <label for="user_name">User Name <span class="text-danger"><?php echo $error['user_name'] ?? " " ;?></span></label>
                    <input type="text" name="user_name" class="form-control" value="<?php echo $user_name ?? ""; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger"><?php echo $error['email'] ?? " " ;?></span></label>
                    <input type="text" name="email" class="form-control"  value="<?php echo $email ?? ""; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger"><?php echo $error['pass'] ?? " " ;?></span></label>
                    <input type="password" name="password" class="form-control"  value="<?php echo $password ?? ""; ?>">
                </div>
                <div class="form-group">
                    <label for="teacher/student">Teacher/Student</label>
                    <select name="teacherorstudent" id="teacherorstudent" class="form-control">
                        <option value="">teacher/student</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="form-group" id="submit_div">
                    <input type="submit" class="btn btn-secondary btn-block" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>




<?php include "includes/footer.php";?>
