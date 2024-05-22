<?php
$id_form = $_GET['idform'];
if(isset($_POST['xacnhan'])){
$sql = "UPDATE form SET tinhtrang = 'Đã xác nhận' WHERE id_form = '$id_form'";
$query = mysqli_query($mysqli,$sql);
echo '<script type="text/javascript">alert("Xác nhận thành công");    window.location.href = "index.php?quanly=lichsuform"; </script>';
}
?>