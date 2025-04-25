<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="http://localhost/cod/202503php/php/basics/request_self.php" method="post">
    <label for="name"></label>
    <input type="text" id="name" name="name" placeholder="Enter your name">
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php

var_dump($_POST);