<?php
namespace Controller;

use Model\Connection ;
use Model\Crud;

class AuthController{
    public function login(){
        require_once './View/login.php';
    }
    public function logout(){
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: home');
        exit();
    }

    public function registration(){
        require_once './View/registration.php';
    }

    public function adminAllUsers(){
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);

        $allUsers = $crud->getUsers();

        require_once './View/admin.php';
    }

    public function adminAllBlogs(){
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);
        $allblogs = $crud->getBlogs();


        require_once './View/adminAllBlogs.php';
    }

    public function newRegistration(){
        $obj = new Connection();
        $conn = $obj->getConnection();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $date = $_POST['date'];
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $date = mysqli_real_escape_string($conn, $date);
        $register = new Crud($conn);
        if($register->newUserRegistration($email , $name , $hashed , $date)){
            echo "alert('Registration Successful')";
        }
        else{
            echo "<script>alert('Registration Failed');window.location.href='registration'</script>";
        }
    }

    public function newLogin(){
        $obj = new Connection();
        $conn = $obj->getConnection();
        $name = $_POST['name'];
        $password = $_POST['password'];
        $name = mysqli_real_escape_string($conn, $name);
        $password = mysqli_real_escape_string($conn, $password);
        $login = new Crud($conn);
        if($login->userLogin($name , $password)){
            echo "true";
        }
        else{
            echo "Login failed. Please check the details and try again.";
        }
    }
    
}
?>