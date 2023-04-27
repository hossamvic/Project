<?php include 'thu/header.php'; ?>
<?php include 'db.php'; ?>
<?php  session_start(); 

 if(isset($_SESSION['auth'])){
    header("location:cate.php");
 }
?>
  <div  class="container">
    <div  class="row">
        <div>
           <img style="max-width: 500px; margin-left:22vw" src="https://i.pinimg.com/originals/75/fa/9b/75fa9b17f632646e5ae7fae3cf837761.jpg" alt="">
        </div>
       
        <div   class="col-4 mx-auto my-1">
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
              
              

            <form style="border-radius: 25px;" action="sure/logcode.php" method="POST" class="border p-3">
               
                <div class="form-group p-2 my-1">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group p-2 my-1">
                    <input style="background-color: blue; color:white" type="submit" value="Log" class="form-control"><br>
                    <a style=" border: 2px solid blue;border-radius:10px ; padding: 5px; margin-left:100px; background-color:blue ;color:white" href="signup.php">Create A new Account </a>
			    </div>

            </form>
            
        </div>
    </div>
</div> 

<?php include 'thu/footer.php'; ?>