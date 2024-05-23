<?php

if (isset($_POST['themtk'])) {
    $hovaten = $_POST['hovaten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];

    // Mã hóa mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Di chuyển hình ảnh đến thư mục
    move_uploaded_file($avatar_tmp, "images/avatar/" . $avatar);

    // Thêm tài khoản vào cơ sở dữ liệu
    $sql_them = "INSERT INTO user (hovaten, username, password, avatar) VALUES ('$hovaten', '$username', '$hashed_password', '$avatar')";
    $query_them = mysqli_query($mysqli, $sql_them);

    if ($query_them) {
        echo "<script>
                alert('Thêm tài khoản thành công');
                window.location.href = 'index.php?quanly=danhsachtaikhoan';
              </script>";
    } else {
        echo "<script>
                alert('Có lỗi xảy ra khi thêm tài khoản');
                window.location.href = 'index.php?quanly=themtaikhoan';
              </script>";
    }
}
?>
<main class="main container" id="main" >
    <div class="container" style="margin-left: 100p;">
    <a href="index.php?quanly=danhsachtaikhoan" Class="btn btn-success" style="margin-left: 500px;">Danh sách quản lí</a>
        <div class="row d-flex justify-content-right align-items-right">
            <div class="col-5">
                <h1 class="mb-5">Thêm tài khoản</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input name="hovaten" type="text" class="form-control" required >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tài khoản</label>
                        <input name="username" type="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input name="password" type="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hình ảnh</label>
                        <input name="avatar" type="file" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="themtk">Thêm tài khoản</button>
                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-6 position-relative">
                <img src="images/quanly.jpeg" class="w-75 position-absolute top-50 start-50 translate-middle" />
            </div>
        </div>
    </div>

</main>