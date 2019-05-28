

<?php

$error=[];
if(isset($_POST['add_student'])){
    $name=$_POST['name'];
    $class=$_POST['class'];
    $roll=$_POST['roll'];
    $address=$_POST['address'];
    $image=$_FILES['image']['name'];
    $image_temp=$_FILES['image']['tmp_name'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];

    $student_data=['name'=>$name,'class'=>$class,'roll'=>$roll,'address'=>$address,'image'=>$image,'phone'=>$phone,'gender'=>$gender];

    $error=validate_data($student_data);

    if(!in_array('image',$error)){
        $query="SELECT * FROM students WHERE image='$image'";
        $send=mysqli_query($connection,$query);

        if(mysqli_num_rows($send)>0){
            $error['image']="Image is already exist choos anothor ";
        }
    }

    if(empty($error)){
        $query="INSERT INTO students(name,roll,address,gender,image,class,phone) ";
        $query.="VALUES ('$name','$roll','$address','$gender','$image','$class','$phone')";
        $send_query=mysqli_query($connection,$query);
        confirm_query($send_query);
        move_uploaded_file($image_temp."images/".$image);
        go("students.php");
    }



}


?>




<div class="edit-content">
    <div class="container">

        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <h1 class="display-4">Add Student</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto mt-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="class">Full Name  <span class="text-danger"><?php
                                if(isset($error['name'])){
                                    echo strtoupper($error['name'])."*";
                                }
                                ?></span></label>
                        <input type="text" class="form-control" name="name" value="<?php if(isset($name)){echo $name; }?>">
                    </div>
                    <div class="form-group">
                        <label for="class">Class <span class="text-danger"><?php
                                if(isset($error['class'])){
                                    echo strtoupper($error['class'])."*";
                                }
                                ?></span></label>
                        <select name="class" id="" class="form-control">
                            <option value="">Select class</option>
                            <?php
                            for($i=1;$i<=12;$i++) {
                                ?>
                                <option
                                    <?php if(isset($class) && $class == $i){echo 'selected';}?>
                                    value="<?=$i?>"><?=$i?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image <span class="text-danger"><?php
                                if(isset($error['image'])){
                                    echo strtoupper($error['image'])."*";
                                }
                                ?></span></label>
                        <input type="file" class="form-control" name="image" value="<?php if(isset($image)){echo $image; }?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address <span class="text-danger"><?php
                                if(isset($error['address'])){
                                    echo strtoupper($error['address'])."*";
                                }
                                ?></span>
                        </label>
                        <input type="text" class="form-control" name="address" value="<?php if(isset($address)){echo $address; }?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone <span class="text-danger"><?php
                                if(isset($error['phone'])){
                                    echo strtoupper($error['phone'])."*";
                                }
                                ?></span></label>
                        <input type="text" class="form-control" name="phone" value="<?php if(isset($phone)){echo $phone; }?>">
                    </div>
                    <div class="form-group">
                        <label for="roll">Roll <span class="text-danger"><?php
                                if(isset($error['roll'])){
                                    echo strtoupper($error['roll'])."*";
                                }
                                ?></span></label>
                        <input type="text" class="form-control" name="roll" value="<?php if(isset($roll)){echo $roll; }?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender <span class="text-danger"><?php
                                if(isset($error['gender'])){
                                    echo strtoupper($error['gender'])."*";
                                }
                                ?></span></label>
                        <select name="gender" id="" class="form-control">
                            <option
                                <?php if(isset($gender) && $gender == 'male'){echo 'selected';}?>
                                value="male" >Male</option>
                            <option
                                <?php if(isset($gender) && $gender == 'female'){echo 'selected';}?>
                                value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="add_student" value="Add student">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>