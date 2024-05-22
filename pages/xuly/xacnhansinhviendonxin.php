<?php
$id_dg = $_GET['id'];
if(isset($_POST['xacnhan'])){
$sql = "UPDATE dongui SET tinhtrang = 'Đã xác nhận' WHERE id_dg = '$id_dg'";
$query = mysqli_query($mysqli,$sql);
echo '<script type="text/javascript">alert("Xác nhận thành công");    window.location.href = "index.php?quanly=danhsachdongui"; </script>';
}
?>