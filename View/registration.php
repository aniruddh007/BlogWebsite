<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../View/css/registration.css">
    <script src="../View/script/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="../View/script/registration.js" type="text/javascript"></script>
</head>

<body>
    <div class="header">
        <a href="home">Home</a>
        <a href="home">About</a>
        <a href="blog">Blogs</a>
        <a href="login">Login</a>
    </div>

    <div class="mainframe">
        <p class="main_heading">Blog Website Registration</p>
        <div class="box">
            <form action="" method="post" class="form_area">
            <div>
                    <label for="name" class="heading">Username</label>
                    <br>
                    <input type="text" class="input_box" name="user_name" id="user_name">
                </div>
                <div>
                    <label for="email" class="heading">Email Address</label>
                    <br>
                    <input type="email" class="input_box" name="userid" id="userid">
                </div>
                <div>
                    <label for="password" class="heading">Password</label>
                    <br>
                    <input type="password" class="input_box" name="password" id="password">
                </div>
                <div>
                    <label for="password" class="heading">Re Enter Password</label>
                    <br>
                    <input type="password" class="input_box" name="re-confirm" id="confirm">
                </div>
                <div>
                    <input class="button" type="submit" value="Register">
                </div>
            </form>
        </div>

    </div>

</body>

</html>