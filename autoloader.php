<?php
//create function which will first store the path of that into a file variable 
function autoloader($class)
{
    $file = "{$class}.php";
    //this will check if file exist 
    if (is_file($file)) {
        //finally if file exist then it will include the file
        include $file;
    }
}
spl_autoload_register("autoloader");
