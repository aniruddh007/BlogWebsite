<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid;
if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
}
// echo $id;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="../View/css/editBlog.css">
    <script src="../View/script/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="../View/script/editBlog.js" type="text/javascript"></script>
</head>

<body>
    <div class="header">
        <a href="home">Home</a>
        <!-- <a href="">About</a> -->
        <a href="myBlogs">Blogs</a>
        <a href="write">Write Blog</a>
        <a href="logout">Log Out</a>
    </div>
    <div class="area">
        <div class="heading">
            Write a Blog
        </div>
        <br>
        <form class="main-form" enctype='multipart/form-data' id = "<?php echo $blog['blogId'] ?>">

            <label for="title" class="heading2">Title</label>
            <input type="text" class="input_box" name="title" id="title" value = "<?php echo $blog['title']?>">
            <label for="content" class="heading2">Content</label>
            <textarea class="content" rows="20" id="content"><?php echo $blog['content']?></textarea ">
            <img src="../View/blogImages/<?php echo $blog['image']?>" alt="">
            <input type="file" id="image" accept="image/*">
            <button type="submit">Update Blog</button>
        </form>
    </div>
</body>

</html>