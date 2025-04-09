<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid;
if( isset( $_SESSION['userid'])){
    $user_id = $_SESSION['userid'];
}
// echo $user_id;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WriteBlog</title>
    <link rel="stylesheet" href="../View/css/writeBlog.css">
    <script src="../View/script/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="../View/script/writeBlog.js" type="text/javascript"></script>
</head>

<body>
    <div class="header">
        <a href="home">Home</a>
        <a href="">About</a>
        <a href="myBlogs">Blogs</a>
        <a href="logout">Log Out</a>
    </div>
    <div class="area">
        <div class="heading">
            Write a Blog
        </div>
        <br>
        <form id="<?php echo $user_id ?>" class="main-form" enctype='multipart/form-data' >

            <label for="title" class="heading2">Title</label>
            <input type="text" class="input_box" name="title" id="title">
            <label for="content" class="heading2">Content</label>
            <textarea class="content" rows="20" id="content"></textarea>
            <input type="file" id="image" accept="image/*">
            <button type="submit">Add Blog</button>
        </form>
    </div>
</body>

</html>