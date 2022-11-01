<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Registration</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-4">
                                <label for="Name">FullName :</label>
                                <input type="text" name="name" id="Name" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-4">
                                <label for="Email">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone number">Phone number :</label>
                                <input type="tel" name="phone" id="Phone number" class="form-control" placeholder="Enter your number" required>
                            </div>
                            <div class="mb-4">
                                <label for="Password">Password :</label>
                                <input type="password" name="password" id="Password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" name="submit" value="Register" class="btn btn-primary">
                            </div>
                            <p>Already have an account? <a href="login_form.php">Login</a></p>
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


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select * from user where email = '$email' && name = '$name'");
    if (mysqli_num_rows($query) > 0) {
        echo "user already exists";
    } else {

        $insert = "insert into user(name,email,phone,password) values('$name','$email','$phone','$password')";

        $result = mysqli_query($conn, $insert);

        if ($result) {
            echo "inserted successfully";
            header('location:loginform.php');
        } else {
            echo "not inserted";
        }
    }
}

?>