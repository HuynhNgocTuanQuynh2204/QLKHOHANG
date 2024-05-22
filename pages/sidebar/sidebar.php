 <?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['hovaten']);
        unset($_SESSION['username']);
        unset($_SESSION['id_user']);
        header('location:dangnhap.php');
    }
?>
 <div class="sidebar" id="sidebar" style="background: black;">
     <nav class="sidebar__container">
         <div class="sidebar__logo" >
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSfeANHnpUZe4q_RBVNCn08tWumb8boJkC1MCK5brVXg&s" alt="" class="sidebar__logo-img" style="width: 150px;">
         </div>

         <div class="sidebar__content">
             <div class="sidebar__list">
                 <?php
                   if(isset($_SESSION['id_user'])){
                  ?>
                 <a href="index.php" class="sidebar__link active-link">
                     <i class="ri-home-5-line"></i>
                     <span class="sidebar__link-name">Trang chủ</span>
                     <span class="sidebar__link-floating">Trang chủ</span>
                 </a>

                 <a href="index.php?quanly=themsinhvien" class="sidebar__link">
                     <i class="ri-compass-3-line"></i>
                     <span class="sidebar__link-name">Thêm sinh viên</span>
                     <span class="sidebar__link-floating">Thêm sinh viên</span>
                 </a>

                 <a href="index.php?quanly=themquanly" class="sidebar__link">
                     <i class="ri-video-line"></i>
                     <span class="sidebar__link-name">Thêm quản lí</span>
                     <span class="sidebar__link-floating">Thêm quản lí</span>
                 </a>

                 <a href="index.php?quanly=donxin" class="sidebar__link">
                     <i class="ri-add-box-line"></i>
                     <span class="sidebar__link-name">Thêm đơn xin</span>
                     <span class="sidebar__link-floating">Thêm đơn xin</span>
                 </a>
             </div>

             <h3 class="sidebar__title">
                 <span>Danh sách</span>
             </h3>
             <div class="sidebar__list">
                 <a href="index.php?quanly=danhsachdonxinsv" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Danh sách đơn xin</span>
                     <span class="sidebar__link-floating">Danh sách đơn xin</span>
                 </a>
                 <a href="index.php?quanly=danhsachformguisv" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Danh sách form gửi</span>
                     <span class="sidebar__link-floating">Danh sách form gửi</span>
                 </a>
             </div>
             <h3 class="sidebar__title">
                 <span>General</span>
             </h3>

             <div class="sidebar__list">
                 <a href="#" class="sidebar__link">
                     <i class="ri-notification-2-line"></i>
                     <span class="sidebar__link-name">Notifications</span>
                     <span class="sidebar__link-floating">Notifications</span>
                 </a>

                 <a href="index.php?quanly=doimatkhausv" class="sidebar__link">
                     <i class="ri-settings-3-line"></i>
                     <span class="sidebar__link-name">Đổi mật khẩu</span>
                     <span class="sidebar__link-floating">Đổi mật khẩu</span>
                 </a>
                 <?php
                     }
                     ?>
                 <a href="index.php?dangxuat=1" class="sidebar__link">
                     <i class="ri-logout-box-r-line"></i>
                     <span class="sidebar__link-name">Logout</span>
                     <span class="sidebar__link-floating">Logout</span>
                 </a>
             </div>
         </div>
         <?php
   if(isset($_SESSION['id_user'])){

?>
         <div class="sidebar__account">
             <img src="images/perfil.png" alt="sidebar image" class="sidebar__perfil">

             <div class="sidebar__names">
                 <h3 class="sidebar__name"><?php echo  $_SESSION['hovaten']  ?></h3>
                 <span class="sidebar__email"><?php echo  $_SESSION['username']  ?></span>
             </div>

             <i class="ri-arrow-right-s-line"></i>
         </div>
     </nav>
 </div>
 </div>
 </nav>
 </div>
 <?php
   }
   ?>