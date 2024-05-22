<!doctype html>
<html lang="en">
<?php
    include("config/config.php");
    session_start();
  if (isset($_POST['timkiem'])){
    $taikhoan = $_POST['taikhoan'];

    $sql_nv = "SELECT * FROM sinhvien WHERE taikhoan = '".$taikhoan."' LIMIT 1 ";
    $row_nv = mysqli_query($mysqli, $sql_nv);
    $id = mysqli_fetch_array($row_nv);
    $count = mysqli_num_rows($row_nv);

    $sql_am = "SELECT * FROM quanly WHERE taikhoan = '".$taikhoan."' LIMIT 1 ";
    $row_am = mysqli_query($mysqli, $sql_am);
    $id_am = mysqli_fetch_array($row_am);
    $count_am = mysqli_num_rows($row_am);

    if ($count > 0 || $count_am > 0){
        if ($count > 0) {
            echo '<script>alert("Địa chỉ đúng vui lòng đặt lại mật khẩu"); window.location.href = "matkhaumoi.php?id=' . $id["id_sv"] . '";</script>';
        }else if ($count_am > 0) {
            echo '<script>alert("Địa chỉ đúng vui lòng đặt lại mật khẩu"); window.location.href = "matkhaumoi.php?id=' . $id_am["id_ql"] . '";</script>';
        } 
    }else {
        echo '<p style="color:red;text-align:center">Không tìm thấy Email của bạn.Vui lòng kiểm tra lại!</p>';
    }
}
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Đăng nhập</title>

    <style>
        .form-group label {
            position: absolute;
            pointer-events: none;
            left: 15px;
            top: 15px;
            transition: 0.2s ease all;
            color: #aaa;
        }

        .form-group input:focus + label,
        .form-group input:valid + label {
            font-size: 12px;
            top: 5px;
            color: #007bff;
        }
    </style>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Quên mật khẩu</h3>
                                <p class="mb-4">Vui lòng nhập đúng tài khoản dưới dạng gmail để kiểm tra.</p>
                            </div>
                            <form action="quenmatkhau.php" method="post">
                                <div class="form-group first">
                                    <input type="text" class="form-control" id="taikhoan" name="taikhoan" required>
                                    <label for="taikhoan">Tài khoản</label>
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <span class="ml-auto"><a href="dangnhap.php" class="forgot-pass">Đăng nhập</a></span>
                                </div>

                                <input type="submit" value="Tìm kiếm tài khoản" name="timkiem" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.form-group input');

            inputs.forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentNode.querySelector('label').style.fontSize = '12px';
                    this.parentNode.querySelector('label').style.top = '5px';
                    this.parentNode.querySelector('label').style.color = '#007bff';
                });

                input.addEventListener('blur', function () {
                    if (this.value === '') {
                        this.parentNode.querySelector('label').style.fontSize = '';
                        this.parentNode.querySelector('label').style.top = '';
                        this.parentNode.querySelector('label').style.color = '#aaa';
                    }
                });
            });
        });
    </script>
</body>

</html>
