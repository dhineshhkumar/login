<?php
session_start();

if (!isset($_SESSION['f_name'])) {
    header('location: loginform.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Welcome page</title>
    <style>
        body {
            background-color: lightblue;
        }

        .content {
            text-align: center;
            align-items: center;
        }

        span {
            background-color: crimson;
            color: white;
            border-radius: 5px;
            padding: 0 10px;
        }

        .container {
            min-height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="content">
            <h3>Hii, <span><?php echo $_SESSION['f_name'] ?></span></h3>
            <h1>Welcome To Our Page</h1>
            <a href="loginform.php" class="btn">Logout</a>
        </div>
    </div>
</body>

</html>