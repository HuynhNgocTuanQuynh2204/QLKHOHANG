<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Hồ sơ người dùng</h1>
        </section>
        <?php
           $sql = "SELECT * FROM user WHERE id_user = " . $_SESSION['id_user'] . " ORDER BY id_user DESC";
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
                                    <td><a href="index.php?quanly=suahoso&id=<?php echo $row['id_user'] ?>"
                                            class="sua">Cập nhập thông tin</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>