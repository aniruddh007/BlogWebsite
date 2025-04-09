<!DOCTYPE html>
<html lang="en">
<?php
$sizeUsers = sizeof($allUsers);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            --background: rgb(135, 131, 131);
            --shadow: rgb(179, 171, 171);

        }

        body {
            background-color: var(--background);
        }

        .header {
            margin: 10px;
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            font-size: 20px;
        }

        a {
            all: unset;
            color: white;
            cursor: pointer;
        }

        .blog-list {
            display: flex;
            flex-direction: column;
        }

        .list-item {
            margin: 0% 5%;
            padding: 10px;
            border-radius: 10px;
            border: 2px solid var(--shadow);
            color: white;
            display: flex;
            justify-content: space-evenly;
        }

        .list-item-header {
            margin: 5%;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 5px var(--shadow);
            color: white;
            display: flex;
            justify-content: space-evenly;
            font-weight: bold;
            font-size: 20px;
        }

        .srno {
            width: 5%;
        }

        .title {
            width: 25%;
        }

        .image {
            width: 40%;
        }

        img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .title-head {
            width: 25%;
            display: flex;
            justify-content: center;
        }

        .image-head {
            width: 40%;
            display: flex;
            justify-content: center;
        }

        .author {
            width: 20%;
            display: flex;
            justify-content: center;
        }

        .date {
            width: 15%;
        }

        .main-list a:hover {
            background-color: rgb(189, 183, 183);
        }

        .userid {
            width: 29%;
        }

        .name {
            width: 17%;
        }

        .email {
            width: 29%;
        }

        .blogcount {
            width: 10%;
        }

        .userdate {
            width: 15%;
        }

        h1 {
            margin-left: 20px;
            color: white;
        }
    </style>
</head>

<body>

    <div class="blog-list">
        <h1>All Users</h1>
        <div class='list-item-header' id=''>
            <div class="userid">UserId</div>
            <div class='name'>Name</div>
            <div class='email'>Email</div>
            <div class='blogcount'>Blog Count</div>
            <div class='userdate'>Date</div>
        </div>
        <div class="main-list">
            <?php
            for ($i = 0; $i < $sizeUsers; $i++) {
                $id = $allUsers[$i][0];
                $username = $allUsers[$i][1];
                $date = $allUsers[$i][3];
                $blogCount = $allUsers[$i][4];

                echo "<div  class='list-item'>
                <div class='userid'>$id</div>
            <div class='name'>$username</div>
            <div class='email'>$id</div>
            <div class='blogcount'>$blogCount</div>
            <div class='userdate'>$date</div>
        </div>";
            }
            ?>
        </div>

    </div>
    <br>
    <!-- <div class="blog-list">
        <h1>All Blogs</h1>
        <div class='list-item-header' id=''>
            <div class="srno">Id</div>
            <div class='title-head'>Title</div>
            <div class='image-head'>Image</div>
            <div class='author'>Author</div>
            <div class='date'>Date</div>
        </div>
        <div class="main-list">
            <?php
            for ($i = 0; $i < $sizeBlog; $i++) {

                $no = $i + 1;
                $id = $allblogs[$i][0];
                $title = $allblogs[$i][1];
                $image = $allblogs[$i][2];
                $date = $allblogs[$i][4];
                $user = $allblogs[$i][6];
                $author = $allblogs[$i][3];

                echo "<a href = 'viewBlog?id=$id'  class='list-item'>
                <div class='srno'>$no</div>
            <div class='title'>$title</div>
            <div class='image'><img src = '../View/blogImages/$image'></div>
            <div class='author'>$author</div>
            <div class='date'>$date</div>
        </a>";
            }
            ?>
        </div>

    </div> -->

</body>

</html>