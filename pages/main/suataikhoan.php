<?php

if (isset($_POST['suatk'])) {
    $id_user = $_POST['id_user'];
    $hovaten = $_POST['hovaten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];

    $set_clause = "hovaten = '$hovaten', username = '$username'";

    // Mã hóa mật khẩu nếu có thay đổi
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $set_clause .= ", password = '$hashed_password'";
    }

    // Di chuyển hình ảnh đến thư mục nếu có thay đổi
    if (!empty($avatar)) {
        move_uploaded_file($avatar_tmp, "images/avatar/" . $avatar);
        $set_clause .= ", avatar = '$avatar'";
    }

    // Cập nhật tài khoản trong cơ sở dữ liệu
    $sql_sua = "UPDATE user SET $set_clause WHERE id_user = '$id_user'";
    $query_sua = mysqli_query($mysqli, $sql_sua);

    if ($query_sua) {
        echo "<script>
                alert('Cập nhật tài khoản thành công');
                window.location.href = 'index.php?quanly=danhsachtaikhoan';
              </script>";
    } else {
        echo "<script>
                alert('Có lỗi xảy ra khi cập nhật tài khoản');
                window.location.href = 'index.php?quanly=suataikhoan&id=$id_user';
              </script>";
    }
}

// Lấy thông tin tài khoản từ cơ sở dữ liệu
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $sql_get = "SELECT * FROM user WHERE id_user = '$id_user'";
    $query_get = mysqli_query($mysqli, $sql_get);
    $row = mysqli_fetch_assoc($query_get);
}
?>

<main class="main container" id="main" >
    <div class="container" style="margin-left: 100p;">
    <a href="index.php?quanly=danhsachtaikhoan" Class="btn btn-success" style="margin-left: 500px;">Danh sách quản lí</a>
        <div class="row d-flex justify-content-right align-items-right">
            <div class="col-5">
                <h1 class="mb-5">Sửa Tài Khoản</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input name="hovaten" type="text" class="form-control" value="<?php echo $row['hovaten']; ?>" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tài khoản</label>
                        <input name="username" type="email" class="form-control" value="<?php echo $row['username']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu (để trống nếu không thay đổi)</label>
                        <input name="password" type="password" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hình ảnh (để trống nếu không thay đổi)</label>
                        <input name="avatar" type="file" class="form-control" >
                        <img src="images/avatar/<?php echo $row['avatar'] ?>" width="150px">
                    </div>

                    <button type="submit" class="btn btn-primary" name="suatk">Cập nhật tài khoản</button>
                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-6 position-relative">
                <img src="images/quanly.jpeg" class="w-75 position-absolute top-50 start-50 translate-middle" />
            </div>
        </div>
    </div>

</main>