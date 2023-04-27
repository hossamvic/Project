include 'thu/header.php';
include 'db.php' ; 
session_start();
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">img</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
    </tr>
  </thead>
  <tbody>
  <?php
if(isset($_SESSION['cart'])) :
foreach($_SESSION['cart'] as $key => $value):
  
    $sql = "SELECT * FROM `products` WHERE `id` = '$value' " ;
    $resutl = mysqli_query($conn,$sql) ; 
    $row = mysqli_fetch_assoc($resutl) ;
?>
 
    <tr>
      <td scope="row"><?= $row['id'] ?></td>
      <td><img style = 'max-width:160px ' src="img/<?= $row['img'];?>" alt=""/></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['price'] ?></td>
      <td> 
      <a href="deletecart.php?id=<?=$key?>"> <button 
      type="button" class="btn-close" aria-label="Close"></button></a>
    </td>
    </tr>

<?php
endforeach; 

endif;
?>
</tbody>
</table>