<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="card mb-3 shadow">
            <div class="card-header bg-primary text-white">
                <h4>เข้าสู่ระบบ</h4>
            </div>
            <div class="card-body">
                <div class="text-center" >
                    <img src="/science/sciday/images/user.jpg" class="rounded-circle" alt="...">
                </div>
                <form action="checkLogin.php" class="mb-3" method="POST">
                    <?php
                        if($_GET['msg']) {
                            echo "<h5 class='my-3 text-danger'>Password ไม่ถูกต้อง กรุณาลองอีกครั้ง</h5>";
                        }
                    ?>
                    <div class="form-group mt-2">
                        <label for="email" class="text-primary fs-18">Email :</label>
                        <input type="email" name="email"  id="email" class="form-control" autofocus required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="text-primary fs-18">Password :</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success text-white mt-4">Login</button>
                        <a href="register.php" class="btn btn-primary mt-4">ลงทะเบียน</a>
                    </div>
                </form>
                <!-- <a href="register.php">สมัครใช้งานใหม่</a> -->
            </div>
        </div>
    </div>
</body>
</html>