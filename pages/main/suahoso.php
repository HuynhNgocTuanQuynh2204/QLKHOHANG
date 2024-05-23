<?php
   $sql = 'SELECT * FROM user WHERE id_user = '.$_GET['id'];
   $qr = mysqli_query($mysqli,$sql);
   $row = mysqli_fetch_array($qr);
?>
<main class="main container" id="main" >
    <div class="container" style="margin-left: 100p;">
        <div class="row d-flex justify-content-right align-items-right">
            <div class="col-5">
                <h1 class="mb-5">Sửa hồ sơ người dùng</h1>
                <form action="index.php?quanly=xulysuahoso&id=<?php echo $row['id_user'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input name="tenql" type="text" class="form-control" value="<?php echo $row['hovaten'] ?>" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input name="matkhau" type="password" class="form-control"  value="<?php echo $row['password'] ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hình ảnh</label>
                        <input name="avatar" type="file" class="form-control" >
                        <img src="images/avatar/<?php echo $row['avatar'] ?>" width="100px" alt="">
                    </div>

                    <button type="submit" class="btn btn-primary" name="suahoso">Sửa thông tin</button>
                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-6 position-relative">
                <img src="images/quanly.jpeg" class="w-75 position-absolute top-50 start-50 translate-middle" />
            </div>
        </div>
    </div>

</main>