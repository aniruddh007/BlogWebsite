<?php
namespace Controller;

use Model\Connection;
use Model\Crud;

class HomeController{
    public function execute(){
        $obj = new Connection();
        $conn = $obj->getConnection();
        $crud = new Crud($conn);
        $allblogs = $crud->getBlogs();
        require_once './View/home.php';
    }
}
?>