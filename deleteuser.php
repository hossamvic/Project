<?php  include 'thu/header.php'; ?>
<?php include 'db.php'; ?>

 <?php 

        $id = $_GET['id'];
        $sql = "DELETE FROM `users` WHERE `id`='$id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:users.php");
        }
      
        
    ?>

    <h1 style="background-color: purple;" class="text-center col-12 bg-danger py-3 text-white my-2">Delete User Done Successfully</h1>
   <?php  header("refresh:1;url=users.php"); ?>

<?php  include 'thu/footer.php'; ?>