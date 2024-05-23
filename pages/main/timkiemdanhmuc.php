<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemdanhmuc" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên danh mục" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách danh mục sản phẩm</h1>
        </section>
        <?php
          if(isset($_POST['timkiem'])){
            $tukhoa = $_POST['tukhoa'];
        } else{
            $tukhoa = '';
        }
           $sql = "SELECT * FROM danhmuc WHERE tendanhmuc LIKE '%" . $tukhoa . "%' ORDER BY id_dm DESC";
           $qr = mysqli_query($mysqli, $sql);
        ?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Tên danh mục <span class="icon-arrow"></span></th>
                        <th>Ghi chú<span class="icon-arrow"></span></th>
                        <th>Sửa <span class="icon-arrow"></span></th>
                        <th>Xóa <span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $i = 0;
                   while ($row = mysqli_fetch_array($qr)) {
                       $i++;
                    ?>
                    <tr>
                    <td><?php echo $i ?></td>
                            <td><?php echo $row['tendanhmuc'] ?></td>
                            <td><?php echo $row['ghichu'] ?></td>
                            <td><a href="index.php?quanly=suadanhmuc&id=<?php echo $row['id_dm'] ?>" class="sua">Sửa</a></td>
                            <td><a href="index.php?quanly=xulythemdanhmuc&id=<?php echo $row['id_dm'] ?>" class="delete">Xóa</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>