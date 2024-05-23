<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemxuatkho" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập mã xuất kho" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Quản lý xuất kho</h1>
        </section>
        <?php
         $sql_lietke_xk = "SELECT * FROM xuatkho ORDER BY maxuathang, id_xk DESC";
         $query_lietke_xk = mysqli_query($mysqli, $sql_lietke_xk);
        ?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th>Mã xuất kho <span class="icon-arrow"></span></th>
                        <th>Tên hàng<span class="icon-arrow"></span></th>
                        <th>Số lượng<span class="icon-arrow"></span></th>
                        <th>Thời gian<span class="icon-arrow"></span></th>
                        <th>Địa chỉ<span class="icon-arrow"></span></th>
                        <th>Ghi chú <span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $current_maxuathang = '';
                    while ($row = mysqli_fetch_array($query_lietke_xk)) {
                        $i++;
                        if($current_maxuathang != $row['maxuathang']){
                            $current_maxuathang = $row['maxuathang'];
                    ?>
                    <tr>
                    <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['maxuathang'] ?></td>
                            <td><?php echo $row['tensanpham'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['thoigian'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['note'] ?></td>
                        </tr>
                        <?php
                                }else{
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php echo $row['tensanpham'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['thoigian'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['note'] ?></td>
                        </tr>
                        <?php
                                }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>