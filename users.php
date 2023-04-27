<?php include 'thu/header.php'; ?>
<?php include 'db.php'; ?>

<?php 

    $sql = "SELECT * FROM `users` ";
    $result = mysqli_query($conn,$sql);

?>

  
    <h1 style="background-color: purple;" class="text-center col-12  py-3 text-white my-2">All Users</h1>
    <a style="padding: 10px; " href="cate.php">
    <button style="background-color:purple ; color:white">Return</button>
   </a><hr>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php  if(mysqli_num_rows($result) > 0): ?>
                    <?php  while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th><?php echo $row['id']; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    
                        <td>
                            <a class="btn btn-danger" href="deleteuser.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-close"></i> Delete User </a>
                        </td>
                    </tr>

                    <?php endwhile; ?>
                <?php endif; ?>

            
                
                </tbody>
            </table>
        </div>
    </div>

<?php include 'thu/footer.php'; ?>