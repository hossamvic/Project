<?php include 'db.php'; ?>

<?php session_start();
 if(!isset($_SESSION['auth'])){
  header("location:index.php");
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce Dashboard</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <input type="checkbox" id="mobile-menu" />

    <div style="background-color:purple;" class="sidebar">
      <div class="logo">
        <i class="fa fa-shopping-bag"></i>
        <h2 style="font-family:sans-serif;">JE-X</h2>
      </div>
    

      <div class="menu">
        <ul>
          <li> <a href="cate.php"  style="color: white;"><i class="fa fa-shopping-basket"></i> Categories</li></a> 
          <li> <a href="cart.php"  style="color: white;"><i class="fa fa-shopping-cart"></i> Cart</li></a>
          <li> <a href="profile.php?id=<?php echo $_SESSION['auth']['id'] ; ?>"  style="color: white;"><i class="fa fa-user"></i> Profile</li></a>
          <?php  if(isset($_SESSION['auth']) && $_SESSION['auth']['permision'] == 'admin'  ) : ?>
          <li> <a href="users.php"  style="color: white;"><i class="fa-solid fa-users"></i> users</li></a>
          <?php endif; ?>
          <li> <a href="signout.php"  style="color: white;"><i class="fa fa-sign-out-alt"></i> Sign Out</li></a>
        </ul>
      </div>
    </div>
    <label for="mobile-menu" id="mmenu">
      <i class="fa fa-bars"></i>
      <i class="fa fa-times"></i>
    </label>

    <div class="content">
      <div class="top">
        
        <div class="user">
          <label style="position: relative">
            <i id="bell" class="fa fa-bell" aria-hidden="true"></i>
          </label>

          <span><?php echo   $_SESSION['auth']['name'] ; ?></span>
        </div>
      </div>

      <h2 style="color:purple;"id="heading">Categories</h2><br>
       <div class="categories">
        <div style="background-color:purple;" class="category">
         <a href="men.php" style="color: white;"><h3>Men Clothes</h3></a> 
        </div> 

        <div style="background-color:purple;" class="category">
        <a href="children.php" style="color: white;"><h3>Children Clothes</h3></a> 
        </div>

        <div style="background-color:purple;" class="category">
        <a href="woman.php" style="color: white;"><h3>Woman Clothes</h3></a> 
        </div>
      </div><br>
      <div style="display: flex; height:70%" class="sale">
        <div >
          <img style="max-width: 750px ; height:100%" src="https://scontent.fcai22-2.fna.fbcdn.net/v/t39.30808-6/340299816_125490567167236_5804145727991350379_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeF1yAV-WRxsrVXjCMzQYu8zaF71P2RVQUloXvU_ZFVBSZAghkRE7b83x7hgFKYFde6CV1LPnXa8H_q1hpiNB1oK&_nc_ohc=YL0PY9Fc-gUAX_bDLVf&_nc_ht=scontent.fcai22-2.fna&oh=00_AfCclj6yhmMJ6gwnGvoW3PeFNlX1lNxexKytiEeabAqlxw&oe=644C47C0" alt="">
        </div>
        <div  >
          <img style="max-width: 530px ; height:50%   "  src="https://scontent.fcai22-1.fna.fbcdn.net/v/t39.30808-6/311777842_5557679584326853_2903430772420326519_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeHmg35-Rtjf5AYl-J0jHMit18twz3m482vXy3DPebjza-Dmao4GkyKRTEaDlTL89ri6YL7DUx7WSYKUbRGj02kb&_nc_ohc=lh6chTXxh_kAX-sglhr&_nc_ht=scontent.fcai22-1.fna&oh=00_AfDVDERi5EPA0VQ9H7j2XbATBwPmLwm53rjBUU54RdVZBQ&oe=644CAE01" alt="">
          <img style="max-width: 530px ; height:50% ; margin-top:-7px" src="https://scontent.fcai22-2.fna.fbcdn.net/v/t39.30808-6/339805662_703109811605412_5846869706393400027_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeFTyvgjqv6Ya1lXpvWLtKHHbHBIncSBgytscEidxIGDK1e7y6hs6WGPUU2TpEyjhuD0j5hsMfn_7vtybFuPWGC3&_nc_ohc=IN9uHo0zPCgAX-ehSzA&_nc_ht=scontent.fcai22-2.fna&oh=00_AfDpAizuanNNcLpLbMub-iz5ChbBsXS9EWd_YsE-qF2cNA&oe=644D184F" alt="">
        </div>
       
      </div>

     
    </div>
  </body>
</html>
 