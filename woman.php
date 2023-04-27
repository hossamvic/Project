<?php
include 'db.php';
session_start();
 if(!isset($_SESSION['auth'])){
  header("location:index.php");
} ?>
<?php  ?>
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
        <h2>JE-X</h2>
      </div>

      <div class="menu">
        <ul>
          <li> <a href="cate.php"  style="color: white;"><i class="fa fa-shopping-basket"></i> Categories</li></a> 
          <li> <a href="cart.php"  style="color: white;"><i class="fa fa-shopping-cart"></i> Cart</li></a>
          <?php  if(isset($_SESSION['auth']) && $_SESSION['auth']['permision'] == 'admin'  ) : ?>
          <li> <a href="add/addwoman.php"  style="color: white;"><i class="fa-solid fa-plus"></i> Add Product</li></a>
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

          <span><?php echo $_SESSION['auth']['name'] ; ?></span>
          <i class="fas fa-chevron-down"></i>
        </div>
      </div><br>

      

      <div style="display: flex; height:30%" class="sale">
        
        
        <div >
          <img style="height:100%" src="https://content.roman.co.uk/upload/1/cms/c3a5cee4_230421_mb.jpg" alt="">
        </div>
        <div >
          <img style="height:100%" src="https://content.roman.co.uk/upload/1/cms/b3f86c4c_230110_header1_dk_v1.jpg" alt="">
        </div> 
        <div >
          <img style="height:100%" src="https://www.nawa3em.com/big/1-gigi-1-03-08-205.jpg" alt="">
        </div> 

        <div >
          <img style="height:100%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeAoGmRCzUtCgA5j7YzMmhgZ4-H-lmDLE77PuaRpRQiciuHTVh9M_C9YK2ZgVsRxqZOY8&usqp=CAU" alt="">
        </div> 
        
      </div>

      
      <div class="all-products">
       
        <?php 
        $sql = "SELECT * FROM `products` WHERE `category_id` = 3 ";
        $result = mysqli_query($conn,$sql);
      ?>
        <div style="margin-top: 60px;" class="products">
        <?php  while($row = mysqli_fetch_assoc($result)): ?>

          <div style="height: 50vh; width:150%" class="product">
            <i class="fa fa-shopping-cart"></i>
            <img  style="height: 30vh;" src="img/<?php echo $row['img'] ;?>" alt="" />
            <div class="addbutton">
              <a href="addtocart.php?id=<?php echo $row['id'] ?>"> <button class="addtocart">ADD TO CART</button><br></a> 
              <?php  if(isset($_SESSION['auth']) && $_SESSION['auth']['permision'] == 'admin'  ) : ?>   
              <a href="delete/deletewoman.php?id=<?php echo $row['id'] ?>"><button class="addtocart">DELETE</button></a> 
              <?php endif; ?> 
             </div>
            <div class="subtitle">
              <div class="name">
                <h5><?php echo $row['name'] ; ?></h5>
              </div>
              <div class="price"><h1><?php echo $row['price']; ?></h1></div>
            </div>
          </div>
    
        <?php endwhile; ?>

        
      </div>
    </div>
  </body>
</html>
