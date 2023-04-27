<?php  
include '../core/validation.php';
 include '../db.php'; 

 session_start();
 $errors = [] ;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $name = trim(htmlspecialchars(htmlentities($_POST['name'])));
 $email = trim(htmlspecialchars(htmlentities($_POST['email'])));
 $password = trim(htmlspecialchars(htmlentities($_POST['password'])));
 
 if ( empty ($name)){ 

    $errors [] =  "please write a name  " ;
  
}
elseif ( strlen($name) < 3 ) { 
    $errors [] = " name must be greater than 3 chars " ;
}
elseif(strlen($name) > 20) { 
    $errors [] =  " name must be smaller than 20 chars" ;

}




if ( empty($email) ) { 
    $errors[] = " please enter your email" ;  // push el value ala el array 
   
 }


 if ( empty ($password)){ 

    $errors [] =  "please write a password  " ;
  
}
elseif ( strlen($password) < 6 ) { 
    $errors [] = " paswword must be greater than 6 chars " ;
}
elseif(strlen($password) > 25) { 
    $errors [] =  " password must be smaller than 25 chars" ;

}

 if (empty($errors)){
    $id = $_SESSION['auth']['id'];
    $sql = "UPDATE `users` SET  `name`='$name' ,`email`='$email' ,`password`='$password' 
    WHERE `id`= '$id' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['auth']['name'] = $name ; 
        $_SESSION['success'] = "Your Data Updated Successfully ";
        header("refresh:1;url=../cate.php");
    }
 }else{
    $_SESSION['errors'] = $errors ;
     header("location:../profile.php");
 }
}

 ?>
  