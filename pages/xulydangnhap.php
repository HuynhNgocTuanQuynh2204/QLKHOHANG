<?php
include("../config/config.php");
session_start();

if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    // Truy vấn người dùng theo tên đăng nhập
    $sql = "SELECT * FROM user WHERE username = '$taikhoan' LIMIT 1";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $hashed_password = $row['password'];

        // Kiểm tra mật khẩu
        if (password_verify($matkhau, $hashed_password)) {
            $_SESSION['hovaten'] = $row['hovaten'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_user'] = $row['id_user'];
            
            echo "<script>
                    alert('Đăng nhập thành công');
                    window.location.href = '../index.php'; 
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Tên đăng nhập hoặc mật khẩu không đúng!');
                    window.location.href = '../dangnhap.php'; 
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Tên đăng nhập hoặc mật khẩu không đúng!');
                window.location.href = '../dangnhap.php'; 
              </script>";
        exit();
    }
}
?>
