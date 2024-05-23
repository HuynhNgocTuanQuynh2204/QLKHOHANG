<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <div class="container" style="margin-left: 100p;">
    <a href="index.php?quanly=danhmucsanpham" Class="btn btn-success" style="margin-left: 500px;">Danh sách danh mục </a>
        <div class="row d-flex justify-content-right align-items-right">
            <div class="col-5">
                <h1 class="mb-5">Thêm danh mục sản phẩm</h1>
                <form action="index.php?quanly=xulythemdanhmuc" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Tên danh mục</label>
                        <input name="tendanhmuc" type="text" class="form-control" required >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ghi chú</label>
                        <input name="ghichu" type="text" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm danh mục</button>
                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-6 position-relative">
                <img src="images/quanly.jpeg" class="w-75 position-absolute top-50 start-50 translate-middle" />
            </div>
        </div>
    </div>

</main>