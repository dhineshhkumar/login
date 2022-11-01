<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot_password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Send Email</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-4">
                                <p>Please enter your email for change your password</p>
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="send" name="reset" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["reset"])) {
    $email = $_POST['email'];

    $mail = new PHPMailer(true);


    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sdhinesh140@gmail.com';
    $mail->Password = 'jmlimgpfquwypehn';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setfrom('sdhinesh140@gmail.com');

    $mail->addAddress($_POST["email"]);

    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);

    $mail->isHTML(true);
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'To reset your password click <a href="http://localhost/Basic Task/change_password.php?code=' . $code . '">here </a>. </br>Reset your password in a day.';

    if ($mail->send()) {
        echo "mail sent successfully";
    } else {
        echo "mail not send";
    }


    $conn = mysqli_connect('localhost', 'root', '', 'login');

    if (!$conn) {
        die('Could not connect to the database.');
    }

    $verifyQuery = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    if (mysqli_num_rows($verifyQuery)) {
        $codeQuery = mysqli_query($conn, "UPDATE user SET code = '$code' WHERE email = '$email'");
    }
}

?>