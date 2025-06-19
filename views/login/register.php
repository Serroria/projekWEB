<?php 

include '../../config/koneksi.php';

$db = new koneksi();
$conn = $db->getConnection();


if(isset($_POST ['signup'])) {
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $role = "user";

    $checkEMail="SELECT * From users where email='$email'";
    $result=$conn->query($checkEMail);

    if($result ->num_rows>0) {
        echo "Email Address Already Exist!";
    } else {
        $insertQuery= "INSERT INTO users(firstName, lastName, email, password, role)
                    VALUES ('$firstName','$lastName','$email','$password', '$role')";
                     session_start();

    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['firstName'];
        if($conn->query($insertQuery)==TRUE){
            header("Location: ../../index.php");
        } else{
            echo "Error:".$conn->error;
        }
    }
}

if(isset($_POST['signin'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    // $password=md5($password);

     
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();

    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['firstName']; 
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    $_SESSION['role'] = $row['role'];

    if($row['role']=="admin"){
        // header("Location: ../../controllers/crud admin/admin_dashboard.php");
          header('Location: ../admin/admin.php');
    }else {
        header("Location: ../../index.php");
    }
    exit();
   } else{
    echo "Not Found, Incorrect Email or Password";
   }
}

?>