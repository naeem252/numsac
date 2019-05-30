<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php if (!isset($_GET['email']) && !isset($_GET['token'])) {
    go('index.php');
}

$email=$_GET['email'];
$token=$_GET['token'];

$query="SELECT * FROM users_teacher WHERE email='$email' AND token='$token'";
$send=mysqli_query($connection,$query);
$row=mysqli_num_rows($send);
$data=mysqli_fetch_assoc($send);

if($row<=0){
    go('index.php');
}
if($email != $data['email'] || $token != $data['token']){
    go('index.php');
}


if(isset($_POST['submit'])){
    $new_pass=$_POST['new'];
    $confirm=$_POST['confirm'];

    if($new_pass != $confirm){
        $_SESSION['err']="they are not";
    }else{

        $password=$_POST['new'];
        $hased=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));

        $query="UPDATE users_teacher SET password='$hased', token='' WHERE email='$email'";
        $send=mysqli_query($connection,$query);
        confirm_query($send);

        echo "<h1 class='text-center'>Your Password has been changed</h1>";
        go('login.php');

    }
}
echo $_SESSION['err'] ?? '';
?>




    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto mt-auto h-100">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <h1>Reset Your Password</h1>
                            <div class="form-group">
                                <label for="newPass">New Password</label>
                                <input type="password" name="new" class="form-control" placeholder="new Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="confirm password"
                                       name="confirm">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Reset">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "includes/footer.php"; ?>