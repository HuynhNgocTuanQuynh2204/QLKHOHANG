<?php
 
    $id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id_sp ='".$id."' LIMIT 1";
    $qr = mysqli_query($mysqli,$sql);
    $row_sp = mysqli_fetch_array($qr);
?>

<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <div class="container" style="margin-left: 100p;">
    <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Tổng số lượng trong kho: <?php echo $row_sp['soluong'] ?></h6>
    <a href="index.php?quanly=danhmucsanpham" Class="btn btn-success" style="margin-left: 500px;">Nhập số lượng cần xuất </a>
        <div class="row d-flex justify-content-right align-items-right">
            <div class="col-5">
                <h1 class="mb-5">Thêm danh mục sản phẩm</h1>
                <form action="index.php?quanly=xuatkhosanpham&id=<?php echo $row_sp['id_sp']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Số lượng</label>
                        <input name="soluong" type="text" class="form-control" required >
                    </div>
                    <button type="submit" class="btn btn-primary" name="xuatkho">Xuất kho</button>
                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-6 position-relative">
                <img src="images/quanly.jpeg" class="w-75 position-absolute top-50 start-50 translate-middle" />
            </div>
        </div>
    </div>

</main>