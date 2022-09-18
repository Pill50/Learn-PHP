<?php
    //connect to database 
    $conn = mysqli_connect('localhost', 'pill', 'Mill13010702pm', 'ninja_pizza');

    //check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>