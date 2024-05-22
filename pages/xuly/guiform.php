<?php
require("carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh');
$now->format('Y-m-d H:i:s');
$tenmd= $_POST['name'];
$file = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$file_time = time().'_'.$file;
$id_sv = $_SESSION['id_sv'];

if(isset($_POST['guiform'])){
    $sql = "INSERT INTO form(id_sinhvien,tenmaudon, file, thoigian,thoigianhoanthanh,tinhtrang,mucdo,donvi,goigam) VALUES ('$id_sv','$tenmd','$file_time','$now',0,'Chờ xét duyệt',0,0,0)";
    $result = mysqli_query($mysqli, $sql);
    move_uploaded_file($file_tmp, 'images/form/'.$file_time);
    echo '<script type="text/javascript">alert("Gửi form thành công");    window.location.href = "index.php?quanly=lichsuform"; </script>';
}else if(isset($_POST['suaguiform'])){
    $id_form = $_GET['idform'];
    if($file != '') {
        move_uploaded_file($file_tmp, 'images/form/'.$file_time);
        $sql = "UPDATE form SET tenmaudon = '$tenmd', file = '$file_time' WHERE id_form = '$id_form'";
     
        // Xóa file cũ
        $sql_select = "SELECT file FROM form WHERE id_form = '$id_form' LIMIT 1";
        $query_select = mysqli_query($mysqli, $sql_select);
        $row = mysqli_fetch_array($query_select);
        $old_image = $row['file'];
        if($old_image != '') {
            unlink('images/form/'.$old_image);
        }
    } else {
        $sql = "UPDATE form SET tenmaudon = '$tenmd' WHERE id_form = '$id_form'";
    }
    $result = mysqli_query($mysqli, $sql);
    if($result) {
        echo '<script type="text/javascript">alert("Sửa mẫu gửi form thành công"); window.location.href = "index.php?quanly=lichsuform"; </script>';
    } else {
        echo '<script type="text/javascript">alert("Sửa mẫu gửi form không thành công"); window.location.href = "index.php?quanly=lichsuform"; </script>';
    }
 }else{
    $id_form = $_GET['idform'];
    $sql = "SELECT * FROM form WHERE id_form= '$id_form' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
       unlink('images/form/'.$row['file']);
    }
    $sql = "DELETE FROM form WHERE id_form = '$id_form'";
    $result = mysqli_query($mysqli, $sql);
    echo '<script type="text/javascript">alert("Xóa mẫu gửi form thành công");    window.location.href = "index.php?quanly=lichsuform"; </script>';
 }







?>