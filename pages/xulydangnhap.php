<?php
  include("../config/config.php");
  session_start();
  if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $sql = "SELECT * FROM user WHERE username = '$taikhoan' AND password = '$matkhau'";
    $result = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($result) > 0 ){
        if(mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_array($result);
            $_SESSION['hovaten'] = $row['hovaten'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_user'] = $row['id_user']; 
        }
    }
  }
?>
<script>
    if("<?php echo isset($_SESSION['id_user']); ?>" === "1"){
        alert("Đăng nhập thành công");
        window.location.href = "../index.php"; 
    }else{
        alert("Đăng nhập thất bại");
        window.location.href = "../dangnhap.php"; 
    }
</script>

