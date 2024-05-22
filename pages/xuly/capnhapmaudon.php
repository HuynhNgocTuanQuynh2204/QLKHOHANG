<?php
  $noidung = $_POST['noidung'];

  if(isset($_POST['capnhap'])){
    $sql = "UPDATE dongui SET tinhtrang = '$noidung' WHERE id_dg = '$_GET[iddg]'";
    $query = mysqli_query($mysqli,$sql);
    echo '<script type="text/javascript">alert("Cập nhập mẫu đơn thành công"); window.location.href = "index.php?quanly=danhsachdonxinsv"; </script>';
  }else  if(isset($_POST['duyet'])){
    $id_dg =$_GET['iddg'];
    $mucdo = $_POST['mucdo'];
    $phongkhoa = $_POST['phongkhoa'];
    $sql = "UPDATE dongui SET tinhtrang = 'Đã tiếp nhận đơn và gửi về đơn vị có liên quan', donvicolienquan = '$phongkhoa' ,mucdo = '$mucdo' WHERE id_dg = '$id_dg'";
    $query = mysqli_query($mysqli,$sql);
    echo '<script type="text/javascript">alert("Gửi thành công đến đơn vị có liên quan");    window.location.href = "index.php?quanly=danhsachdonxinsv"; </script>';
  }else{
    $id_dg =$_GET['iddg'];
    $sql = "UPDATE dongui SET tinhtrang = 'Đã tiếp nhận đơn từ đơn vị' WHERE id_dg = '$id_dg'";
    $query = mysqli_query($mysqli,$sql);
    echo '<script type="text/javascript">alert("Đã tiếp nhận đơn");    window.location.href = "index.php?quanly=danhsachmaudonxinsvcntt"; </script>';
  }

?>