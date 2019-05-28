<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>

<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query="SELECT * FROM users_teacher WHERE user_name ='$username' AND password=$password";
    $send=mysqli_query($connection,$query);
    if(mysqli_num_rows($send)<1){
        echo "nothing found";
    }else{

        $_SESSION['username']=$username;

        $query="INSERT INTO active(user_name) ";
        $query.="VALUES ('$username')";
        $send=mysqli_query($connection,$query);

        go('index.php');
    }
}


?>



<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <input type="submit" name="submit" value="Log in" class="btn btn-secondary">
            </form>
        </div>
    </div>
</div>



<?php include "includes/footer.php";?>