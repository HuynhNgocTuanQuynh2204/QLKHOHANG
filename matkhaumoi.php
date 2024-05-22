<!doctype html>
<html lang="en">
<?php
  include("config/config.php");
  session_start();
if (isset($_POST['datlaimatkhau'])) {
    $matkhau1 = md5($_POST['password1']);
    $matkhau2 = md5($_POST['password2']);
    $id = $_GET['id'];
    if ($matkhau1 == $matkhau2) {
        $sql_dk = "UPDATE sinhvien SET matkhau = '$matkhau1' WHERE id_sv = '$id'";
        $row_dk = mysqli_query($mysqli, $sql_dk);

        $sql_am = "UPDATE quanly SET matkhau = '$matkhau1' WHERE id_ql = '$id'";
        $row_am = mysqli_query($mysqli, $sql_am);

        if ($row_dk || $row_am)  {   
            echo '<script>alert("Mật khẩu đặt lại thành công");window.location.href = "dangnhap.php";</script>';
        } else {  
            echo '<script>alert("Đã xảy ra lỗi. Vui lòng thử lại!"); window.location.href =  "dangnhap.php";</script>';       
        }
    } else {
        echo '<script>alert("Mật khẩu không khớp. Vui lòng thử lại!"); window.location.href = "dangnhap.php";</script>';
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
                                <h3>Đặt lại mật khẩu</h3>
                                <p class="mb-4">Mật khẩu vui lòng nhập thêm kí tự đặc biệt để đảm bảo về an toàn bảo mật.</p>
                            </div>
                            <form action="matkhaumoi.php" method="post">
                                <div class="form-group first">
                                    <input type="password" class="form-control" id="taikhoan" name="password1" required>
                                    <label for="taikhoan">Mật khẩu</label>
                                </div>
                                <div class="form-group last mb-4">
                                    <input type="password" class="form-control" id="matkhau" name="password2" required>
                                    <label for="matkhau">Nhập lại mật khẩu</label>
                                </div>
                                <input type="submit" value="Đặt lại mật khẩu" name="datlaimatkhau" class="btn btn-block btn-primary">
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
