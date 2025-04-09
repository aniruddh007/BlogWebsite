<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userid;
if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
}
$size = sizeof($allblogs);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="../View/css/blog.css">
    <script src="../View/script/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="../View/script/blog.js" type="text/javascript"></script>
</head>

<body>
    <div class="header">
        <a href="home">Home</a>
        <a href="myBlogs">My Blogs</a>
        <a href="write">Write Blog</a>
    </div>

    <div class="blog-list">
        <div class='list-item-header' id=''>
            <div class="srno">Sr. No.</div>
            <div class='title-head'>Title</div>
            <div class='author'>Author</div>
            <div class='date'>Date</div>
        </div>
        <div class="main-list">
            <?php
            for ($i = 0; $i < $size; $i++) {

                $no = $i + 1;
                $id = $allblogs[$i][0];
                $title = $allblogs[$i][1];
                $date = $allblogs[$i][4];
                $user = $allblogs[$i][6];
                $author = $allblogs[$i][3];

                echo "<a href = 'viewBlog?id=$id'  class='list-item'>
                <div class='srno'>$no</div>
            <div class='title'>$title</div>
            <div class='author'>$author</div>
            <div class='date'>$date</div>
        </a>";
            }
            ?>
            <!-- <?php
            for ($i = 0; $i < 10; $i++) {
                $no = $i + 1;
                $date = "05-04-2025";
                $title = "Velit, doloremque amet aperiam molestiae totam nihil obcaecati pariatur natus quaerat, cum deseru";
                $author = 'Aniruddh Singh';
                echo "<a href = 'viewBlog?id=$no'  class='list-item' id = ''>
                <div class='srno'>$no</div>
            <div class='title'>$title</div>
            <div class='author'>$author</div>
            <div class='date'>$date</div>
        </a>";
            }
            ?> -->
        </div>

    </div>

</body>

</html>