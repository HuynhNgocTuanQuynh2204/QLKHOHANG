<?php
$id = $_GET['id'];
$sql = "DELETE FROM user WHERE id_user = '$id'";
mysqli_query($mysqli, $sql);
echo "<script>
        alert('Xóa tài khoản thành công');
        window.location.href = 'index.php?quanly=danhsachtaikhoan';
      </script>";

?>