<main class="main container" id="main">
    <?php
      if(isset($_SESSION['id_user'])){
    ?>
         <h1 style="text-align: center;color: black;">Xin chào: <?php echo $_SESSION['hovaten'] ?></h1>
        <?php
      }
      ?>
</main>
