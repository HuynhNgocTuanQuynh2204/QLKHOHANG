<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemsanphamxuatkho" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách sản phẩm</h1>
        </section>
        <?php
           $sql = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_dm = danhmuc.id_dm ORDER BY sanpham.id_sp DESC";
           $qr = mysqli_query($mysqli, $sql);
        ?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Tên hàng <span class="icon-arrow"></span></th>
                        <th> Số lượng <span class="icon-arrow"></span></th>
                        <th> Tên danh mục <span class="icon-arrow"></span></th>
                        <th>Ghi chú<span class="icon-arrow"></span></th>
                        <th>Xuất kho <span class="icon-arrow"></span></th>
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
                            <td><?php echo $row['tensanpham'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['tendanhmuc'] ?></td>
                            <td><?php echo $row['chuthich'] ?></td>
                            <td><a href="index.php?quanly=soluong&id=<?php echo $row['id_sp'] ?>" class="sua">Xuất</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>