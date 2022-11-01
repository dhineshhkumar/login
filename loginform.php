<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginForm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-4">
                                <label for="Email">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-4">
                                <label for="Password">Password :</label>
                                <input type="password" name="password" id="Password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" name="submit" value="login" class="btn btn-primary">
                            </div>
                            <p>Don't have an account? <a href="reg_form.php">Register</a></p>
                            <br>
                            <p>if you forgot your password <a href="forgot.php">forgot_password</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php

$conn = mysqli_connect("localhost", "root", "", "login");
if (!$conn) {
    die("connection error" . mysqli_connect_error());
}

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "select * from  user where email = '$email' && password = '$password'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if (isset($_POST['submit'])) {
            $_SESSION['f_name'] = $row['name'];
            header('location:page.php');
        };
    } else {
        echo 'incorrect email or password';
    }
};

?>