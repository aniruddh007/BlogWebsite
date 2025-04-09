<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid;
if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
}
// print_r($blog);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog['title'] ?></title>
    <link rel="stylesheet" href="../View/css/home.css">
    <script src="../View/script/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="../View/script/home.js" type="text/javascript"></script>
</head>

<body>
    <div class="header">
        <a href="home">Home</a>
        <a href="home">About</a>
        <a href="myBlogs">Blogs</a>
        <a href="logout">Log Out</a>
    </div>

    <div class="main">
        <div class='blog' id='$id'>
            <div class='title-section'>
                <div class='title'>
                    <?php echo $blog['title'] ?></div>
                <div class='author'>
                    <span>By <?php echo $blog['author'] ?></span>
                    <span>on <?php echo $blog['date'] ?></span>
                </div>
                <div class='data'>
                    <img src='../View/blogImages/<?php echo $blog['image'] ?>'>
                    <p> <?php echo $blog['content'] ?> </p>
                </div>
            </div>
        </div>";
    </div>

</body>

</html>