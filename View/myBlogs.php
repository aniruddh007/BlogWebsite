<!DOCTYPE html>
<html lang="en">
<html lang="en">
<?php
session_start();
$userid;
if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
}
$size = sizeof($allblogs);
$count = 1 ;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>
    <link rel="stylesheet" href="../View/css/myBlogs.css">
    <script src="../View/script/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="../View/script/myBlogs.js" type="text/javascript"></script>
</head>

<body>
    <div class="header">
        <a href="home">Home</a>
        <!-- <a href="blog">Blogs</a> -->
        <a href="myBlogs">My Blogs</a>
        <a href="write">Write Blog</a>
        <a href="logout">Log Out</a>
    </div>

    <div class="blog-list">
        <div class='list-item-header' id=''>
            <div class="srno">Sr. No.</div>
            <div class='title-head'>Title</div>
            <div class='date'>Date</div>
            <div class="opeartions">Operations</div>
        </div>
        <div class="main-list">
            <?php
            for ($i = 0; $i < $size; $i++) {

                $id = $allblogs[$i][0];
                $title = $allblogs[$i][1];
                $date = $allblogs[$i][4];
                $user = $allblogs[$i][6];
                if ($user == $user_id) {
                    echo "<div class='list-item' id = ''>
                <a href = 'viewBlog?id=$id'  class='view' id = ''>
                <div class='srno'>$count</div>
            <div class='title'>$title</div>
            <div class='date'>$date</div>
            </a>
            <div class='operations'><a href='editBlog?id=$id'>Edit</a>
        <a href='delete?id=$id'>Delete</a></div>
        </div>";
        $count++;
                }
            }
            ?>
        </div>

    </div>

</body>

</html>