<?php include 'db.php'; ?>
<?php session_start();
 if(!isset($_SESSION['auth'])){
  header("location:index.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
</head>
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
            <?php 
                 
                 if(isset($_SESSION['errors'])): 
                 foreach($_SESSION['errors'] as $error) :
                 
            ?>
                    <div class="alert alert alert-danger p-1"><?php echo $error; ?></div>
                <?php
                 endforeach;
                endif; 
                   unset($_SESSION['errors']);                 
            
              ?>
                <?php 
                 
                 if(isset($_SESSION['success'])): 
            ?>
                    <div class="alert alert alert-success p-1"><?php echo$_SESSION['success']; ?></div>
                <?php
                endif; 
                   unset($_SESSION['success']);                 
            
              ?>
               <?php
               $id = $_SESSION['auth']['id']; 
               $sql = "SELECT * FROM `users` WHERE `id`='$id' LIMIT 1";
               $result = mysqli_query($conn,$sql);
               $row = mysqli_fetch_assoc($result);
               ?>

            <form style="margin:250px ;"  action="sure/profilecode.php" method="POST" >
                <div>
                    <label for="name">Name</label><br>
                     <input style="padding: 15px 5px 15px 15px; border:1px solid black"  style="padding: 15px; background-color:" type="text" name="name" value="<?php echo $_SESSION['auth']['name'] ;?>"  id="name">
                </div>
                <div >
                    <label for="email">Email</label><br>
                    <input  style="padding: 15px 5px 15px 15px; border:1px solid black" type="email" name="email" value="<?php echo$_SESSION['auth']['email'] ;?>"  id="email">
                </div>
                <div>
                    <label for="password">password</label><br>
                    <input style="padding: 15px 5px 15px 15px; border:1px solid black"  style="padding: 15px;" type="password" name="password" class="form-control" id="password">
                </div><br>
                <div >
                    <input  style="padding: 10px; background-color:blue;color:white" type="submit" value="Update" class="form-control">
                  
            </form>
            
        </div>
    </div>
</div> 


</body>
</html>
 
   