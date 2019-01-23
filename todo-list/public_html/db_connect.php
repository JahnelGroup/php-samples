<?php

function db(){
    global $link;
    $link = mysqli_connect("db", "root", "rootpassword", "todolist") or die("couldn't connect to database");
    return $link;
}