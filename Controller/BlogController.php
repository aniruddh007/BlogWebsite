<?php

namespace Controller;

use Model\Connection;
use Model\Crud;

class BlogController
{
    public function execute()
    {
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);
        $allblogs = $crud->getBlogs();

        require_once './View/blog.php';
    }

    public function writeBlog()
    {
        require_once './View/writeBlog.php';
    }

    public function viewBlog()
    {
        $id = $_GET['id'];
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);
        $blog = $crud->getOne($id);
        require_once './View/viewBlog.php';
    }

    public function editBlog()
    {
        $id = $_GET['id'];
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);
        $blog = $crud->getOne($id);
        require_once './View/editBlog.php';
    }

    public function delete(){
        $id = $_GET['id'];
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);

        $oldImgUrl = $crud->getOne($id);
        $oldImgUrl = $oldImgUrl['image'];

        $oldImgUrl = 'C:/xampp/htdocs/blogs/View/blogImages/'.$oldImgUrl;

        unlink($oldImgUrl);
        
        if($crud->delete($id)){
            header('Location: myBlogs');
        }
    }

    public function withImage(){
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);

        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $_POST['blogId'];

        $oldImgUrl = $crud->getOne($id);
        $oldImgUrl = $oldImgUrl['image'];

        $oldImgUrl = 'C:/xampp/htdocs/blogs/View/blogImages/'.$oldImgUrl;

        unlink($oldImgUrl);

        $image_loc = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $dest_add = "C:/xampp/htdocs/blogs/View/blogImages/" . time() . '.' . $ext;
        move_uploaded_file($image_loc, $dest_add);
        $dest_add = time().'.'.$ext;

        $title = mysqli_real_escape_string($conn, $title);
        $content = mysqli_real_escape_string($conn, $content);
        $path = mysqli_real_escape_string($conn, $dest_add);

        if ($crud->editWithImage($content , $title , $path , $id )) {
            echo "true";
        } else {
            echo "Failed to upload the Blog";
        }
    
    }

    public function withoutImage(){
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);

        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $_POST['blogId'];

        $title = mysqli_real_escape_string($conn, $title);
        $content = mysqli_real_escape_string($conn, $content);

        if ($crud->editWithoutImage($content , $title , $id )) {
            echo "true";
        } else {
            echo "Failed to upload the Blog";
        }
    }

    public function myBlog()
    {
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);
        $allblogs = $crud->getBlogs();

        require_once './View/myBlogs.php';
    }

    public function addBlog()
    {
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);

        $image_loc = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $dest_add = "C:/xampp/htdocs/blogs/View/blogImages/" . time() . '.' . $ext;
        move_uploaded_file($image_loc, $dest_add);
        $dest_add = time().'.'.$ext;

        $title = $_POST['title'];
        $date = $_POST['date'];
        $content = $_POST['content'];
        $userId = $_POST['userId'];
        $author = $crud->getAuthor($userId);

        $title = mysqli_real_escape_string($conn, $title);
        $date = mysqli_real_escape_string($conn, $date);
        $content = mysqli_real_escape_string($conn, $content);
        $userId = mysqli_real_escape_string($conn, $userId);
        $author = mysqli_real_escape_string($conn, $author);
        $path = mysqli_real_escape_string($conn, $dest_add);

        if ($crud->addBlog($title , $date , $content , $userId , $author , $path )) {
            echo "true";
        } else {
            echo "Failed to upload the Blog";
        }
    }
}
