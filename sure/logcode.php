<?php  
include '../core/validation.php';
 include '../db.php'; 
 session_start();
 $errors = [] ;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $email = trim(htmlspecialchars(htmlentities($_POST['email'])));
 $password = trim(htmlspecialchars(htmlentities($_POST['password'])));



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
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            if ($row['email'] == $email && $row['password'] == $password ){
                $_SESSION['auth'] = $row;
                $_SESSION['auth']['permision'] = "user";
                header("location:../cate.php");

            }
            
        }
    }
    if(!isset($_SESSION['auth'])){
        $sql = "SELECT * FROM `admin`";
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                if ($row['email'] == $email && $row['password'] == $password ){
                    $_SESSION['auth'] = $row;
                    $_SESSION['auth']['permision'] = "admin";
                    header("location:../cate.php");
    
                }
                
            }
        }
    }
    if(!isset($_SESSION['auth'])){
        $_SESSION['errors'] [] = "Wrong Info ";
        header("location:../index.php");
    }



 }else{
    $_SESSION['errors'] = $errors ;
     header("location:../index.php");
 }
}

 ?>