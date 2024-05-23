<main class="main container" id="main">
<?php
    // Lấy thông tin sản phẩm hiện tại
    $sql = 'SELECT * FROM sanpham WHERE id_sp = ' . $_GET['id'];
    $qr = mysqli_query($mysqli, $sql);
    $row_sp = mysqli_fetch_array($qr);
?>
    <div class="container" style="margin-left: 100px;">
        <a href="index.php?quanly=danhsachsanpham" class="btn btn-success" style="margin-left: 500px;">Danh sách sản phẩm</a>
        <div class="row d-flex justify-content-right align-items-right">
            <div class="col-5">
                <h1 class="mb-5">Sửa sản phẩm</h1>
                <form action="index.php?quanly=xulysanpham&id=<?php echo $row_sp['id_sp'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input name="tensanpham" type="text" class="form-control" value="<?php echo $row_sp['tensanpham']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số lượng</label>
                        <input name="soluong" type="text" class="form-control" value="<?php echo $row_sp['soluong']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ghi chú</label>
                        <input name="chuthich" type="text" class="form-control" value="<?php echo $row_sp['chuthich']; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputState" class="form-label">Danh mục</label>
                        <select id="inputState" class="form-select" name="danhmuc">
                            <?php
                                $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_dm DESC";
                                $qr_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                                while ($row_danhmuc = mysqli_fetch_array($qr_danhmuc)) {
                                    // Kiểm tra xem danh mục này có phải là danh mục của sản phẩm không
                                    $selected = ($row_danhmuc['id_dm'] == $row_sp['id_dm']) ? "selected" : "";
                            ?>
                            <option value="<?php echo $row_danhmuc['id_dm']; ?>" <?php echo $selected; ?>><?php echo $row_danhmuc['tendanhmuc']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="suasanpham">Sửa sản phẩm</button>
                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-6 position-relative">
                <img src="images/themsanpham.jpg" class="w-75 position-absolute top-50 start-50 translate-middle" />
            </div>
        </div>
    </div>
</main>
