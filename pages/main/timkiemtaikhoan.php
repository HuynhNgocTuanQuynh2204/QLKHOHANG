<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemtaikhoan" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên chủ tài khoản" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách tài khoản</h1>
        </section>
        <?php
          if(isset($_POST['timkiem'])){
            $tukhoa = $_POST['tukhoa'];
        } else{
            $tukhoa = '';
        }
            $sql = "SELECT * FROM user WHERE hovaten LIKE '%" . $tukhoa . "%' ORDER BY id_user DESC";
            $qr = mysqli_query($mysqli, $sql);
        ?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Hình ảnh <span class="icon-arrow"></span></th>
                        <th> Tên chủ tài khoản<span class="icon-arrow"></span></th>
                        <th> Tài khoản <span class="icon-arrow"></span></th>
                        <th>Mật khẩu<span class="icon-arrow"></span></th>
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
                            <td><img src="images/avatar/<?php echo $row['avatar'] ?>" width="150px"></td>
                            <td><?php echo $row['hovaten'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><a href="index.php?quanly=suataikhoan&id=<?php echo $row['id_user'] ?>" class="sua">Sửa</a></td>
                            <td><a href="index.php?quanly=xulytaikhoan&id=<?php echo $row['id_user'] ?>" class="delete">Xóa</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>