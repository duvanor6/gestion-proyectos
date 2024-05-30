<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/logins/register.css">
    <script src="public/js/icons.js"></script>
    <link rel="icon" href="public/images/icon.png" type="image/png">
    <title>Registrarse - GESTION DE PROYECTOS</title>
</head>
<body>

<section id="main">
    <div class="registerDiv">
        <h2>Registrarse</h2>
        <form action="" method="post" id="validRegisterDiv">
            <div class="formNames">
                <h2 class="h2">Datos Personales</h2>
                <div class="name-surnameDiv">
                    <input type="text" class="inputName" id="names" placeholder="Nombre">
                    <input type="text" class="inputSurname" id="surnames" placeholder="Apellido">
                </div>
                <div class="formDiv">
                    <input type="text" class="inputForm" id="address" placeholder="Dirección">
                </div>
                <div class="formDiv">
                    <input type="text" class="inputForm" id="phone" placeholder="Teléfono">
                </div>
                <div class="formDiv">
                    <select class="inputForm" id="gender">
                        <option value="">Sexo</option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                        <option value="other">Otro</option>
                    </select>
                </div>
                <div class="formDiv">
                    <input type="date" class="inputForm" id="birthdate" placeholder="Fecha de Nacimiento">
                </div>
                <div class="formDiv">
                    <select class="inputForm" id="profession">
                        <option value="">Profesión</option>
                        <option value="project_manager">Gerente de proyecto</option>
                        <option value="developer">Desarrollador</option>
                    </select>
                </div>
                <div class="formDiv">
                    <input type="text" class="inputForm" id="username" placeholder="Username">
                </div>
                <div id="errorLine1" class="errorLine"></div>
            </div>

            <div class="formPasswords">
                <h2 class="h2">Contraseña</h2>
                <div class="formDiv">
                    <input type="password" class="inputForm" id="pass" placeholder="Contraseña">
                </div>
                
                <div class="formDiv">
                    <input type="password" class="inputForm" id="confirmPass" placeholder="Confirmar Contraseña">
                </div>
                <div id="errorLine2" class="errorLine"></div>
            </div>

            <div>
                <input type="button" class="inputBtn" id="registerBtn" value="Registrar">
            </div>
        </form>
        <input type="hidden" value="<?php echo constant('URL'); ?>" id='getUrl'>

        <form action="<?php echo constant('URL').'profile'?>" method="post" id="checkRegisterDiv">
            <div class="formDiv" id="resultsOfValidForm"></div>
            <div class="formDiv">
                <input type="submit" class="inputBtnSubmit" id="registerBtn2" value="Registrar">
                <input type='button' onclick='location.href="register"' class='inputBtnCancel' value='Cancelar'>
            </div>
        </form>

        <div class="inputDiv">
            <button class="inputBtnLink">
                <a href="<?php echo constant('URL').'login';?>" class="link">Iniciar Sesión</a>
            </button>
        </div>

    </div>
</section>

<script src="public/js/logins/register.js"></script>
</body>
</html>
