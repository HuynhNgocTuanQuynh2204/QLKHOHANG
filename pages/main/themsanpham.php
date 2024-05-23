<main class="main container" id="main">
    <div class="container" style="margin-left: 100p;">
        <a href="index.php?quanly=danhsachsanpham" class="btn btn-success" style="margin-left: 500px;">Danh sách sản phẩm</a>
        <div class="row d-flex justify-content-right align-items-right">
            <div class="col-5">
                <h1 class="mb-5">Thêm sản phẩm</h1>
                <form action="index.php?quanly=xulysanpham" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input name="tensanpham" type="text" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số lượng</label>
                        <input name="soluong" type="text" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ghi chú</label>
                        <input name="chuthich" type="text" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputState" class="form-label">Danh mục</label>
                        <select id="inputState" class="form-select" name="danhmuc">
                            <?php
                                $sql = "SELECT * FROM danhmuc ORDER BY id_dm DESC";
                                $qr = mysqli_query($mysqli, $sql);
                                while ($row = mysqli_fetch_array($qr)) {
                            ?>
                            <option value="<?php echo $row['id_dm']; ?>"><?php echo $row['tendanhmuc']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-6 position-relative">
                <img src="images/themsanpham.jpg" class="w-75 position-absolute top-50 start-50 translate-middle" />
            </div>
        </div>
    </div>
</main>
