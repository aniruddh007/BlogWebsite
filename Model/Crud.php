<?php

namespace Model;

use Model;

class Crud
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function newUserRegistration($userid, $username, $password, $date)
    {
        $sql = "INSERT INTO user_info (user_id , username , password , date , blogCount) VALUES ('$userid' ,'$username','$password','$date' , '0')";
        if ($this->conn->query($sql)) {
            echo "<script>window.location.href('home')</script>";
        }
        return false;
    }
    public function userLogin($userid, $password)
    {
        $sql = "select password from user_info where user_id = '$userid'";
        $result = $this->conn->query($sql);
        $result = mysqli_fetch_assoc($result);
        if (isset($result)) {
            $hashedPassword = $result['password'];
            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION["userid"] = $userid;
                return true; // Login successful
            }
        }
        return false;
    }
    public function getAuthor($userId)
    {
        $sql = "select username from user_info where user_id = '$userId'";
        $result = $this->conn->query($sql);
        $result = mysqli_fetch_assoc($result);
        return $result['username'];
    }
    public function addBlog($title, $date, $content, $userId, $author, $path)
    {
        $sql = "INSERT INTO `allblogs` (`blogId`, `title`, `image`, `author`, `date`, `content`, `user_id`) VALUES (NULL, '$title', '$path', '$author', '$date', '$content', '$userId')";
        if ($this->conn->query($sql)) {
            $q = "select blogCount from user_info where user_id = '$userId' ";
            $count = $this->conn->query($q);
            $count = mysqli_fetch_assoc($count);
            $count = $count['blogCount'];
            $count++;
            $sql = "UPDATE user_info SET blogCount = '$count' WHERE user_id = '$userId'";
            if($this->conn->query($sql)){
                return true ;
            }
            return false ;
        }
        return false ;
    }
    public function delete($id){
        $sql = "select user_id FROM allblogs WHERE blogId = '$id'";
        $result = $this->conn->query($sql);
        $result = mysqli_fetch_assoc($result);
        $userId = $result['user_id'];

        $sql = "DELETE FROM allblogs WHERE blogId = '$id'";
        if ($this->conn->query($sql)) {
            $sql = "update user_info set blogCount = blogcount - 1 where user_id = '$userId'";
            if ($this->conn->query($sql)) {
                return true ;
            }
            else{
                return false ;
            }
        }
        else{
            return false ;
        }
    }
    public function getBlogs(){
        $sql = "SELECT * FROM allblogs";
        $result = $this->conn->query($sql);
        $result = $result->fetch_all();
        return $result ;
    }
    public function getUsers(){
        $sql = "SELECT * FROM user_info";
        $result = $this->conn->query($sql);
        $result = $result->fetch_all();
        return $result ;
    }
    public function getOne($id)
    {
        $sql = "select * from allblogs where blogId = '$id'";
        $result = $this->conn->query($sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }
    public function editWithImage($content , $title , $image , $id ){
        $sql = "UPDATE allblogs SET title = '$title' , content = '$content', image = '$image' where blogId = '$id' ";
        if($this->conn->query($sql)){
            return true ;
        }
        else{
            return false ;
        }
    }
    public function editWithoutImage($content , $title , $id ){
        $sql = "UPDATE allblogs SET title = '$title' , content = '$content' where blogId = '$id' ";
        if($this->conn->query($sql)){
            return true ;
        }
        else{
            return false ;
        }
    }
}
