<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot_password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Reset password</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-4">
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-4">
                                <input type="password" name="new_password" id="password" class="form-control" placeholder="Enter your new password" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="change" name="change" class="btn btn-primary">
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
    if(isset($_GET['code'])) {
        $code = $_GET['code'];

        $conn = mysqli_connect('localhost', 'root', '', 'login');
        if(!$conn) {
            die('Could not connect to the database');
        }

        $verifyQuery = mysqli_query($conn,"SELECT * FROM user WHERE code = '$code'");

        if(mysqli_num_rows($verifyQuery) == 0) {
            header("Location: forgot.php");
            exit();
        }

        if(isset($_POST['change'])) {
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];

            $changeQuery = mysqli_query($conn,"UPDATE user SET password = '$new_password' WHERE email = '$email' and code = '$code'");

            if($changeQuery) {
                header("Location: loginform.php");
            }
        }

    }
    else {
        header("Location: forgot.php");
        exit();
    }
?>
