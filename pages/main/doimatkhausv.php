<main class="main container" id="main" >
    <div class="text-center">
    <a href="index.php?quanly=quanlythongtin" Class="btn btn-success" style="margin-left: 100px;padding: 5px;">Quản lý thông tin </a>
        <form action="" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Đổi mật khẩu</h3>
                            </div>
                            <?php
                                    if (isset($_POST['doimatkhausv'])){
                                        $matkhau_cu = md5($_POST['password_cu']);
                                        $matkhau_moi = md5($_POST['password_moi']);
                                        
                                        if(isset($_SESSION['id_sv'])) {
                                            $id_sv = $_SESSION['id_sv'];
                                            $sql_sv = "SELECT * FROM sinhvien WHERE id_sv = '".$id_sv."' AND matkhau ='".$matkhau_cu."' LIMIT 1";
                                            $result_sv = mysqli_query($mysqli, $sql_sv);
                                            $count_sv = mysqli_num_rows($result_sv);

                                            if ($count_sv > 0) {
                                                $sql_update_sv = "UPDATE sinhvien SET matkhau ='".$matkhau_moi."' WHERE id_sv = '".$id_sv."'";
                                                $update_sv= mysqli_query($mysqli, $sql_update_sv);
                                                echo '<p style="color:green;text-align:center;">Mật khẩu đã được thay đổi </p>';
                                            } else {
                                                echo '<p style="color:red;text-align:center;">Mật khẩu cũ không đúng, vui lòng nhập lại</p>';
                                            }
                                        }
                                    }
                                    ?>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="password_cu" class="form-label">Mật khẩu cũ</label>
                                    <input type="password" class="form-control" name="password_cu" id="password_cu"
                                        placeholder="Mật khẩu cũ..." required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_moi" class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="password_moi" id="password_moi"
                                        placeholder="Mật khẩu mới..." required>
                                </div>
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary btn-block" name="doimatkhausv"
                                        value="Đổi mật khẩu">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</main>
