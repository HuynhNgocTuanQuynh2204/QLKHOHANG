<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" href="css/dangnhap.css">

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
                    <img src="https://www.sam.edu.vn/Data/Sites/1/News/2763/4bb205bd6c1455446ac0d94c5882e845.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Đăng nhập hệ thống</h3>
                                <p class="mb-4">Đăng nhập vào hệ thống bằng email và mật khẩu mà nhà trường đã cung cấp.</p>
                            </div>
                            <form action="pages/xulydangnhap.php" method="post">
                                <div class="form-group first">
                                    <input type="text" class="form-control" id="taikhoan" name="taikhoan" required>
                                    <label for="taikhoan">Tài khoản</label>
                                </div>
                                <div class="form-group last mb-4">
                                    <input type="password" class="form-control" id="matkhau" name="matkhau" required>
                                    <label for="matkhau">Mật khẩu</label>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <span class="ml-auto"><a href="quenmatkhau.php" class="forgot-pass">Quên mật khẩu ?</a></span>
                                </div>

                                <input type="submit" value="Đăng nhập" name="dangnhap" class="btn btn-block btn-primary">
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
