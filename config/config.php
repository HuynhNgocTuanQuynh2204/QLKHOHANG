<?php
    $mysqli = new mysqli("localhost","root","","quanlikhohang");

    if ($mysqli -> connect_errno) {
    echo "Kết nối lỗi: " . $mysqli -> connect_error;
    exit();
    }
?>