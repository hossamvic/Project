<?php include '../thu/header.php'; ?>
<?php include '../db.php'; ?>

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
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <input type="checkbox" id="mobile-menu" />


    <?php 
    session_start();
    $errors = [] ;
     if($_SERVER['REQUEST_METHOD'] == "POST"){
        $img = $_FILES['file'];
        $f_name = $img['name'];
        $f_type = $img['type'];
        $f_tmp_name = $img['tmp_name'];
        $f_error = $img['error'];
        $f_size = $img['size'];
        $name = trim(htmlspecialchars(htmlentities($_POST['name'])));
        $price = trim(htmlspecialchars(htmlentities($_POST['price'])));

        if($f_name != ''){
             $ext = pathinfo($f_name);
             $original_name = $ext['filename'];
             $original_ext = $ext['extension'];
             $newname = uniqid("",true). "." .$original_ext;
             $allowed = array("png","jpg","jpeg","gif","pdf");
             if(in_array($original_ext,$allowed)){
                  if($f_error != 0 ){
                      
                    $error [] = "You Have An Error";
                  
                  }
             }else{
              $error [] = "Your File I=Not Allowed";
             }

        }else{
          $errors [] = "Please Choose A Image"; 
        }

        if(empty($name)  && empty($price) ){
        $errors [] = "Please Fill All Inputs" ;
        }
        if(!is_string($name)){
          $errors [] = "Please Enter A string Name";
        }
        if(!is_numeric($price)){
          $errors [] = "Please Enter Integer Price";
        }
  
        if(empty($errors)){
          $sql = "INSERT INTO `products` (`img`,`category_id`,`name`,`price`) VALUES ('$newname','3','$name','$price') ";
          move_uploaded_file($f_tmp_name,"../img/".$newname);
          $result = mysqli_query($conn,$sql);
          if($result){
            $sucess = "Your Product Added Successfully";
            header("location:../woman.php");
          }
        }else{
          $_SESSION['errors'] = $errors ;
          header("location:addwoman.php");
        }

     }
    ?>
<div style="margin: 30vh ;" class="col-md-6 offset-md-3">
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
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName1">Product Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div><br>
            <div>
               <label for="file">Img</label>
                <input type="file" id="file" name="file" multiple />
            </div><br>

            <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="password" name="price" class="form-control" id="exampleInputPassword1">
            </div><br>
         
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <?php include '../thu/footer.php'; ?>
