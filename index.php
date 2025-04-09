<?php
include_once "autoloader.php";

use Controller\AuthController;
use Controller\BlogController;
use Controller\HomeController;

if (isset($_SERVER['PATH_INFO'])) {
    $URI = $_SERVER['PATH_INFO'];
    if ($URI == "/home") {
        $obj = new HomeController();
        $obj->execute();
    }
    if ($URI == "/admin/users") {
        $obj = new AuthController();
        $obj->adminAllUsers();
    }
    if ($URI == "/admin/blogs") {
        $obj = new AuthController();
        $obj->adminAllBlogs();
    }
    if ($URI == "/login") {
        $obj = new AuthController();
        $obj->login();
    }
    if ($URI == "/register") {
        $obj = new AuthController();
        $obj->registration();
    }
    if ($URI == "/blog") {
        $obj = new BlogController();
        $obj->execute();
    }
    if ($URI == "/myBlogs") {
        $obj = new BlogController();
        $obj->myBlog();
    }
    if ($URI == "/viewBlog") {
        $obj = new BlogController();
        $obj->viewBlog();
    }
    if ($URI == "/editBlog") {
        $obj = new BlogController();
        $obj->editBlog();
    }
    if ($URI == "/write") {
        $obj = new BlogController();
        $obj->WriteBlog();
    }
    if ($URI == "/writeBlog") {
        $obj = new BlogController();
        $obj->addBlog();
    }
    if ($URI == "/withImage") {
        $obj = new BlogController();
        $obj->withImage();
    }
    if ($URI == "/withoutImage") {
        $obj = new BlogController();
        $obj->withoutImage();
    }
    if ($URI == "/newRegistration") {
        $obj = new AuthController();
        $obj->newRegistration();
    }
    if ($URI == "/newLogin") {
        $obj = new AuthController();
        $obj->newLogin();
    }
    if ($URI == "/delete") {
        $obj = new BlogController();
        $obj->delete();
    }
    if ($URI == "/logout") {
        $obj = new AuthController();
        $obj->logout();
    }
} else {
    $obj = new HomeController();
    $obj->execute();
}
