<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/PHPMailer/src/Exception.php';
require './vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require './vendor/phpmailer/PHPMailer/src/SMTP.php';
require  "./vendor/autoload.php";

$mailer=new PHPMailer(true);

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $token=bin2hex(openssl_random_pseudo_bytes(50));

    $query="SELECT * FROM users_teacher WHERE email='$email'";
    $send=mysqli_query($connection,$query);
    $row=mysqli_num_rows($send);

    if($row>0){
        $query="UPDATE users_teacher SET token='$token' WHERE email='$email'";
        $send=mysqli_query($connection,$query);
        try {
            $mailer->isSMTP();                                            // Set mailer to use SMTP
            $mailer->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
            $mailer->SMTPAuth = true;                                   // Enable SMTP authentication
            $mailer->Username = '14db6889bc047b';                     // SMTP username
            $mailer->Password = '53d605c9f957fa';                               // SMTP password
            $mailer->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mailer->Port = 2525;                                    // TCP port to connect to

            //Recipients
            $mailer->setFrom('naeemhasan252@gmail.com', 'Naeem Hasan');
            $mailer->addAddress($email, 'Joe User');     // Add a recipient

            // Attachments

            // Content
            $mailer->isHTML(true);                                  // Set email format to HTML
            $mailer->Subject = 'Test Mailer package';
            $mailer->Body = "<a href=http://localhost/numsac/admin/reset.php?email=".$email."&token=".$token.">Click Here</a>";
            $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mailer->send();
        }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mailer->ErrorInfo}";
    }
    }
}


?>


<div class="container">
    <div class="row mt-4">
        <div class="col-md-5 mx-auto my-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Enter your email</label>
                            <input type="email" class="form-control" placeholder="email" name="email">
                        </div>
                        <a href="/numsac/admin/">Back to home << </a>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "includes/footer.php";?>
