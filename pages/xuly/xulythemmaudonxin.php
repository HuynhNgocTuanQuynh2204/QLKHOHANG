<?php
$tenmd= $_POST['name'];
$file = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$file_time = time().'_'.$file;
$huongdan = $_POST['huongdan'];

if(isset($_POST['themmaudon'])){
    $sql = "INSERT INTO maudon(tenmd, file, huongdan) VALUES ('$tenmd', '$file_time', '$huongdan')";
    $result = mysqli_query($mysqli, $sql);
    move_uploaded_file($file_tmp, 'images/maudon/'.$file_time);
    echo '<script type="text/javascript">alert("Thêm mẫu đơn thành công");    window.location.href = "index.php?quanly=danhsachmaudon"; </script>';
}else if(isset($_POST['suamaudon'])){
    $id_md = $_GET['idmd'];
    if($file != '') {
        move_uploaded_file($file_tmp, 'images/maudon/'.$file_time);
        $sql = "UPDATE maudon SET tenmd = '$tenmd', file = '$file_time', huongdan = '$huongdan' WHERE id_md = '$id_md'";
        
        // Xóa file cũ
        $sql_select = "SELECT file FROM maudon WHERE id_md = '$id_md' LIMIT 1";
        $query_select = mysqli_query($mysqli, $sql_select);
        $row = mysqli_fetch_array($query_select);
        $old_image = $row['file'];
        if($old_image != '') {
            unlink('images/maudon/'.$old_image);
        }
    } else {
        $sql = "UPDATE maudon SET tenmd = '$tenmd', huongdan = '$huongdan' WHERE id_md = '$id_md'";
    }
    $result = mysqli_query($mysqli, $sql);
    if($result) {
        echo '<script type="text/javascript">alert("Sửa mẫu đơn thành công"); window.location.href = "index.php?quanly=danhsachmaudon"; </script>';
    } else {
        echo '<script type="text/javascript">alert("Sửa mẫu đơn không thành công"); window.location.href = "index.php?quanly=danhsachmaudon"; </script>';
    }
}else{
    $id_md = $_GET['idmd'];
    $sql = "SELECT * FROM maudon WHERE id_md = '$id_md' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
       unlink('images/maudon/'.$row['file']);
    }
    $sql = "DELETE FROM maudon WHERE id_md = '$id_md'";
    $result = mysqli_query($mysqli, $sql);
    echo '<script type="text/javascript">alert("Xóa mẫu đơn thành công");    window.location.href = "index.php?quanly=danhsachmaudon"; </script>';
}
 


?>