<?php
session_start();
$userid;
if( isset( $_SESSION['userid'])){
    $user_id = $_SESSION['userid'];
}
$size = sizeof($allblogs);
// echo "<pre>";
// print_r($allblogs);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../View/css/home.css"></script>
</head>

<body>
    <div class="header">
        <?php
        if(isset($user_id)){
        echo "<a href='home'>Home</a><a href='home'>About</a><a href='myBlogs'>Blogs</a><a href='logout'>Logout</a>";
        }
        else{
            echo "<a href='home'>Home</a><a href='home'>About</a><a href='home'>Blogs</a><a href='login'>Login</a>";
        }
        ?>

    </div>

    <div class="main">

        <?php
        if($size > 5 ){
            $size = 5 ;
        }
        for ($i = 0; $i < $size; $i++) {
            $title = (string) $allblogs[$i][1];
            $content = $allblogs[$i][5] ;
            $image = $allblogs[$i][2];
            $id = $allblogs[$i][0];
            $author = $allblogs[$i][3];
            $date = $allblogs[$i][4];
            echo "<div class='blog' id='$id'>
            <div class='title-section'>
                <div class='title'>$title
                    </div>
                <div class='author'>
                    <span>By $author</span>
                    <span>on $date</span>
                </div>
                <div class='data'>
                    <img src='../View/blogImages/$image'>
                    <p>$content</p>
                </div>
            </div>
        </div>";
        }
        ?>
    </div>
</body>
</html>