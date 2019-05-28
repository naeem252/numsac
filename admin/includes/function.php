
<?php

function url($url){
    return urlencode($url);
}
function confirm_query($sql){
    global $connection;
    if(!$sql){
        die("query faild".mysqli_error($connection));
    }
}


function go($url){
    header("Location:".$url);
}

function validate_registration($data){
    $errors=[];
    if(empty(trim($data['full_name']))){
        $errors['full_name']="full name cannot be empty";
    }elseif(strlen($data['full_name']) < 2 || strlen($data['full_name']) > 25 ){
        $errors['full_name']="full name should be between 2 to 25 character";
    }
    if(empty(trim($data['email']))){
        $errors['email']="email  cannot be empty";
    }elseif(strlen($data['full_name']) < 2 || strlen($data['full_name']) > 25 ){
        $errors['email']="email should be between 2 to 25 character";
    }
    if(empty(trim($data['pass']))){
        $errors['pass']="password  cannot be empty";
    }elseif(strlen($data['full_name']) < 2 || strlen($data['full_name']) > 25 ){
        $errors['pass']="password should be between 2 to 25 character";
    }
global $connection;
    $query="SELECT * FROM users_teacher WHERE user_name='{$data['user_name']}'";
    $send=mysqli_query($connection,$query);
    $row=mysqli_num_rows($send);
    if(empty(trim($data['user_name']))){
        $errors['user_name']="email  cannot be empty";
    }elseif(strlen($data['user_name']) < 2 || strlen($data['user_name']) > 25 ){
        $errors['user_name']="email should be between 2 to 25 character";
    }elseif($row>0){
        $errors['user_name']="user name all ready exist ";

    }
    return $errors;
}

function validate_data($data){

    $errors=[];

    if(empty(trim($data['name']))){
        $errors['name']="name cannot be empty";
    }elseif(strlen($data['name']) < 2 || strlen($data['name']) > 25 ){
        $errors['name']="name should be between 2 to 25 character";
    }

    if(empty(trim($data['class']))){
        $errors['class']="class cannot be empty";
    }
    if(empty(trim($data['image']))){
        $errors['image']="Add your image";
    }elseif((substr($data['image'],-3)) !== 'jpg'){
        $errors['image']='You shoul select a jpg file';
    }
    if(empty(trim($data['address']))){
        $errors['address']="Add con't be empty";
    }
    if(empty(trim($data['phone']))){
        $errors['phone']="add phone nubmer";

    }elseif(strlen($data['phone']) != 11){
        $errors['phone']="Phone number must be 11 character";
    }
    if(empty(trim($data['roll']))){
        $errors['roll']="add roll nubmer";

    }elseif (!preg_match('/^[1-9][0-9]*$/',$data['roll'])){
        $errors['roll']="invalid roll number";
    }
    if(empty(trim($data['gender']))){
        $errors['gender']="add gender";
    }


    return $errors;



}





?>