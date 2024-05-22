<?php
  $tensv = $_POST['name'];
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_time = time().'_'.$file;
    $taikhoan = $_POST['taikhoan'];
    $matkhau = md5($_POST['matkhau']);
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];
    $lop = $_POST['lop'];
    $khoa = $_POST['khoa'];
    $chuyennganh = $_POST['chuyennganh'];
    $id_ql = $_SESSION['id_ql'];
    $masv =rand(0,9999);
    if(isset ($_POST['themsinhvien'])){
    $sql = "INSERT INTO sinhvien (tensv, hinhanh, taikhoan, matkhau,masv, ngaysinh, diachi, sodienthoai, lop, khoa, chuyennganh, id_ql) VALUES ('$tensv', '$file_time', '$taikhoan', '$matkhau','$masv', '$ngaysinh', '$diachi', '$sodienthoai', '$lop', '$khoa', '$chuyennganh', '$id_ql')";
    $result = mysqli_query($mysqli, $sql);
    move_uploaded_file($file_tmp, 'images/hinhanhsv/'.$file_time);
    echo '<script type="text/javascript">alert("Thêm thông tin thành công");    window.location.href = "index.php?quanly=danhsachsinhvien"; </script>';
   }else if(isset ($_POST['suasinhvien'])){
    $id_sv = $_GET['idsv'];
    if($file != '') {
        move_uploaded_file($file_tmp, 'images/hinhanhsv/'.$file_time);
        $sql = "UPDATE sinhvien SET tensv = '$tensv', hinhanh = '$file_time', ngaysinh = '$ngaysinh', diachi = '$diachi', sodienthoai = '$sodienthoai', lop = '$lop', khoa = '$khoa', chuyennganh = '$chuyennganh' WHERE id_sv = '$id_sv'";
        
        // Xóa ảnh cũ
        $sql_select = "SELECT hinhanh FROM sinhvien WHERE id_sv = '$id_sv' LIMIT 1";
        $query_select = mysqli_query($mysqli, $sql_select);
        $row = mysqli_fetch_array($query_select);
        $old_image = $row['hinhanh'];
        if($old_image != '') {
            unlink('images/hinhanhsv/'.$old_image);
        }
    } else {
        $sql = "UPDATE sinhvien SET tensv = '$tensv', ngaysinh = '$ngaysinh', diachi = '$diachi', sodienthoai = '$sodienthoai', lop = '$lop', khoa = '$khoa', chuyennganh = '$chuyennganh' WHERE id_sv = '$id_sv'";
    }
    $result = mysqli_query($mysqli, $sql);
    if($result) {
        echo '<script type="text/javascript">alert("Sửa thông tin thành công"); window.location.href = "index.php?quanly=danhsachsinhvien"; </script>';
    } else {
        echo '<script type="text/javascript">alert("Sửa thông tin không thành công"); window.location.href = "index.php?quanly=danhsachsinhvien"; </script>';
    }
}
   else{
    $id_sv = $_GET['idsv'];
    $sql = "SELECT * FROM sinhvien WHERE id_sv = '$id_sv' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
       unlink('images/hinhanhsv/'.$row['hinhanh']);
    }
    $sql = "DELETE FROM sinhvien WHERE id_sv = '$id_sv'";
    $result = mysqli_query($mysqli, $sql);
    echo '<script type="text/javascript">alert("Xóa thông tin thành công");    window.location.href = "index.php?quanly=danhsachsinhvien"; </script>';
   }


?>