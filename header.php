<?php

session_start();
?>
<header class="header">

   <div class="flex">
      <?php
      if (isset($_SESSION['userId']) && isset($_SESSION['email'])) {
         ?>
         <a href="#" class="logo">foodies</a>


            <nav class="navbar">
                   <a href="admin.php">add products</a>
                   <a href="products.php">view products</a>
                   <a><?php echo $_SESSION['userId']; ?></a>
                   <a href=""> <? echo $_SESSION['email']; ?></a>
            </nav>
      <?php

      }
      ?>

      <a href="cart.php" class="cart">cart <span></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>