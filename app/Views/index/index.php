<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action="user/login" method="post">

    </form>
    <hr>
    <?php if(isset($_GET['status'])) { echo $_GET['status'];} ?>
    <h1>Registro</h1>
    <form action="user/create" method="post">
        <input type="text" name="name" id="inputName" required>
        <input type="email" name="email" id="inputEmail" requried>
        <input type="password" name="password" id="inputPassword" required>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>