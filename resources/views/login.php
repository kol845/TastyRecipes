<!DOCTYPE html>
<html lang = "en">
<head>
    <link rel="stylesheet" type="text/css" href="resources/css/reset.css">
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <link rel="stylesheet" type="text/css" href="resources/css/login.css">
    <?php  include "resources/fragments/header.php";     ?>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

      <?php showHeader(4); ?>

<div class = "mainLogin">
    <h1>Sign in</h1>
    <form action="classes/Chat/Model/loginHandler.php" method="post">
        <a>Username: <input type="text" name="username"></a>
        <a>Password: <input type="text" name="password"></a>
        <a><input type="submit"></a>
    </form>
</div>


</body>
</html>
