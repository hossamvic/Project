<?php include 'thu/header.php'; ?>
<?php include 'db.php'; ?>
<?php  session_start(); 

 if(isset($_SESSION['auth'])){
    header("location:cate.php");
 }
?>
  <div class="container">
    <div class="row">
    <div>
           <img style="max-width: 500px; margin-left:22vw ; margin-top:-25px" src="https://i.pinimg.com/originals/75/fa/9b/75fa9b17f632646e5ae7fae3cf837761.jpg" alt="">
        </div>
        <div class="col-4 mx-auto my-5">
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
        
              

            <form style="border-radius: 25px;" action="sure/signupcode.php" method="POST" class="border p-3">
                <div class="form-group p-2 my-1">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group p-2 my-1">
                    <input style="background-color: blue; color:white" type="submit" value="Register" class="form-control"><br>
                    

                </div>
            </form>
            
        </div>
    </div>
</div> 

<?php include 'thu/footer.php'; ?>