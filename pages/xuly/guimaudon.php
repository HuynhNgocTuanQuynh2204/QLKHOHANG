<?php
require("carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh');
$now->format('Y-m-d H:i:s');
$tenmd= $_POST['name'];
$noidung = $_POST['noidung'];
$file = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$file_time = time().'_'.$file;
$id_sv = $_SESSION['id_sv'];

if(isset($_POST['guimaudon'])){
    $sql = "INSERT INTO dongui(id_sinhvien,tendon, file, noidung, ngaygui,ngayhoanthanh,tinhtrang,mucdo,donvicolienquan,goigam) VALUES ('$id_sv','$tenmd','$file_time', '$noidung',  '$now',0,'Chờ xét duyệt',0,0,0)";
    $result = mysqli_query($mysqli, $sql);
    move_uploaded_file($file_tmp, 'images/dongui/'.$file_time);
    echo '<script type="text/javascript">alert("Gửi đơn thành công");    window.location.href = "index.php?quanly=danhsachdongui"; </script>';
}else if(isset($_POST['suaguimaudon'])){
    $id_dg = $_GET['iddg'];
    if($file != '') {
        move_uploaded_file($file_tmp, 'images/dongui/'.$file_time);
        $sql = "UPDATE dongui SET tendon = '$tenmd', file = '$file_time', noidung = '$noidung' WHERE id_dg = '$id_dg'";
     
        // Xóa file cũ
        $sql_select = "SELECT file FROM dongui WHERE id_dg = '$id_dg' LIMIT 1";
        $query_select = mysqli_query($mysqli, $sql_select);
        $row = mysqli_fetch_array($query_select);
        $old_image = $row['file'];
        if($old_image != '') {
            unlink('images/dongui/'.$old_image);
        }
    } else {
        $sql = "UPDATE dongui SET tendon = '$tenmd', noidung = '$noidung' WHERE id_dg = '$id_dg'";
    }
    $result = mysqli_query($mysqli, $sql);
    if($result) {
        echo '<script type="text/javascript">alert("Sửa mẫu gửi đơn thành công"); window.location.href = "index.php?quanly=danhsachdongui"; </script>';
    } else {
        echo '<script type="text/javascript">alert("Sửa mẫu gửi đơn không thành công"); window.location.href = "index.php?quanly=danhsachdongui"; </script>';
    }
 }else{
    $id_dg = $_GET['iddg'];
    $sql = "SELECT * FROM dongui WHERE id_dg = '$id_dg' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
       unlink('images/dongui/'.$row['file']);
    }
    $sql = "DELETE FROM dongui WHERE id_dg = '$id_dg'";
    $result = mysqli_query($mysqli, $sql);
    echo '<script type="text/javascript">alert("Xóa mẫu gửi đơn thành công");    window.location.href = "index.php?quanly=danhsachdongui"; </script>';
 }







?>