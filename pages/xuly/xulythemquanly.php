<?php
require("carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh');
$now->format('Y-m-d H:i:s');
 $tenql = $_POST['name'];
 $taikhoan = $_POST['taikhoan'];
 $matkhau = md5($_POST['matkhau']);
 $quyenhan = $_POST['quyenhan'];

 if(isset($_POST['themquanly'])){
    $sql = "INSERT INTO quanly(tenql, taikhoan, matkhau,ngaytao, quyenhan) VALUES ('$tenql', '$taikhoan', '$matkhau','$now', '$quyenhan')";
    $result = mysqli_query($mysqli, $sql);
    echo '<script type="text/javascript">alert("Thêm quản lý thành công");    window.location.href = "index.php?quanly=danhsachquanly"; </script>';
 }else if(isset($_POST['suaquanly'])){
    $id_ql = $_GET['idql'];
    $sql = "UPDATE quanly SET tenql = '$tenql', taikhoan = '$taikhoan', matkhau = '$matkhau', quyenhan = '$quyenhan' WHERE id_ql = '$id_ql'";
    $result = mysqli_query($mysqli, $sql);
    echo '<script type="text/javascript">alert("Sửa quản lý thành công");    window.location.href = "index.php?quanly=danhsachquanly"; </script>';
 }else{
    $id_ql = $_GET['idql'];
    $sql = "DELETE FROM quanly WHERE id_ql = '$id_ql'";
    $result = mysqli_query($mysqli, $sql);
    echo '<script type="text/javascript">alert("Xóa quản lý thành công");    window.location.href = "index.php?quanly=danhsachquanly"; </script>';
 }


?>