<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="public/images/icon.png" type="image/png">
    <link rel="stylesheet" href="public/css/logins/login.css">
    <script src="public/js/icons.js"></script>

    <title>Iniciar Sesión - GESTIÓN DE PROYECTOS</title>
</head>
<body>

<section id="main">
    <div class="loginDiv">
        <h1>GESTIÓN DE PROYECTOS</h1>
        <div class="links-div">
            <p class="linkActived">Iniciar Sesión</p>
             </div>
        <form action="<?php echo constant('URL').'login/checkLogin';?>" method="post" class="formDiv">
            <div class="input-div">
                <input type="text" class="inputLogin" name="username" placeholder="Username">
            </div>

            <div class="input-div">
                <input type="password" class="inputLogin" name="password" placeholder="Password">
            </div>

            <div class="input-div">
                <input type="submit" class="submitLogin" name="btnLogin" value="Login">
            </div>
        </form>
        <a href="<?php echo constant('URL').'register';?>" class="link">Registrarse</a>
      
        <div class="errorLine" id="errorLine">Usuario o clave incorrecta!</div>
    </div>
</section>

</body>
</html>
