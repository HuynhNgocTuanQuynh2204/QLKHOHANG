<?php
$noidung = $_POST['noidung'];
 if(isset($_POST['capnhap'])){
    $sql = "UPDATE form SET tinhtrang = '$noidung' WHERE id_form = '$_GET[idform]'";
    $query = mysqli_query($mysqli,$sql);
    echo '<script type="text/javascript">alert("Cập nhập form thành công"); window.location.href = "index.php?quanly=danhsachformguisv"; </script>';
 }else if(isset($_POST['duyet'])){
    $idform=$_GET['idform'];
    $mucdo = $_POST['mucdo'];
    $phongkhoa = $_POST['phongkhoa'];
    $sql = "UPDATE form SET tinhtrang = 'Đã tiếp nhận đơn và gửi về đơn vị có liên quan',mucdo ='$mucdo',donvi ='$phongkhoa' WHERE id_form = '$idform'";
    $query = mysqli_query($mysqli,$sql);
    echo '<script type="text/javascript">alert("Xác nhận thành công");    window.location.href = "index.php?quanly=danhsachformguisv"; </script>';
 }else{
   $id_form =$_GET['idform'];
   $sql = "UPDATE form SET tinhtrang = 'Đã tiếp nhận đơn từ đơn vị' WHERE id_form = '$id_form'";
   $query = mysqli_query($mysqli,$sql);
   echo '<script type="text/javascript">alert("Đã tiếp nhận đơn");    window.location.href = "index.php?quanly=danhsachformguisvcntt"; </script>';
 }


?>