<?php
session_start();
include_once ('../../database/connection.php');
/*$pdo = conectar(); */
$pdo = connection::getInstance();  
?>
 <!----http://localhost/EleganceWine%20MVC%20Final/app/database/connection.php-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../backup/toast/style.toast.css">
    <!-- ====== Fontawesome CDN Link ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="../../libs/site/css/style.navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../../libs/site/css/style.login.css">
    <link rel="stylesheet" href="../../libs/site/css/style.footer.css">
    <link rel="stylesheet" href="../../footer.css">
    <title>Elegance Wine - Autenticação</title>
    <link rel="shortcut icon" type="image" href="../../libs/site/img/WineNavbar.png">
</head>
<body>

<?php include('../template/HeaderView.php'); ?>

<div class="account-page">
<div class="container">
    <div class="row">
        <div class="col-2">
            <img src="../../libs/site/img/vbarril-imageauccont.png" width="80%">
        </div>

        <div class="col-2">
            <div class="form-container">
                <div class="form-btn">
                    <i class="fa-solid fa-circle-user"></i><span onclick="login()">Entrar</span>
                    <i class="fa-solid fa-clipboard-question"></i><span onclick="register()">Registrar</span>
                </div>
                <h1 id="Indicator"></h1>
                <!--action envia informações para tela cadastrada "loginEvent.php"-->
                <form method="POST" action="LoginEvent.php" id="LoginForm">
                    <div class="fonts">
                    <input type="email" name="email" id="email" placeholder="Digite seu e-mail" spellcheck="false"/>
                    <input type="password" name="password" id="password" placeholder="Digite sua senha" spellcheck="false"/>
                    </div>
                    <div class="button__text"> 
                    <button type="submit" class="button" name="logar">
                         <i class="fa-solid fa-sign-in-alt"></i> Entrar</div>
                    </button>  
                    <a href="Passworld">Esqueceu a senha?</a>
                </form>

                
                <!--action envia informações para tela cadastrada "registerEvent.php"-->
                <form method="POST" action="RegisterEvent.php" id="RegisterForm">
                    <input type="text" name="nome" id="nome" placeholder="Nome">
                 <!--   <input type="cpf" placeholder="CPF"> -->
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="password" placeholder="Senha">
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                    <div class="button__text"> 
                    <button type="submit" class="button" name="Cadastrar_se">
                         <i class="fa-solid fa-wine-glass"></i> Cadastrar</div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="footer-container">
        <footer>
            <div class="footer01">
                <div class="logo-text">
                    <img src="../../libs/site/img/WineNavbar.png" alt="Logo footer" width="100px" height="60px">
                    <p>&copy; 2022 - EleganceWine</p>
                </div>
                <div class="icons">
                    <ion-icon size="large" name="logo-twitter" class="icon"></ion-icon>
                    <ion-icon size="large" name="logo-instagram" class="icon"></ion-icon>
                </div>
            </div>
        </footer>
    </div>

    <div class="footer2">
    </div>



</section>
    <script src="https://kit.fontawesome.com/a8239b02c3.js" crossorigin="anonymous"></script>
    <script src="./assets/js/main.js"></script>
<!----JavaScript ativação de formulario---->
<script>
var RegisterForm = document.getElementById("RegisterForm");
var LoginForm = document.getElementById("LoginForm");
var Indicator = document.getElementById("Indicator");

    function register(){
        RegisterForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(165px)";
    }

    function login(){
        RegisterForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(40px)";
    }

</script>
<script src="scriptprogress.js"></script>
<!-- JavaScript -->
<script>
  const input = document.querySelector("input"),
        emailIcon = document.querySelector(".email-icon")
        input.addEventListener("keyup", () =>{
          let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

          if(input.value === ""){
            emailIcon.classList.replace("uil-check-circle", "uil-envelope");
            return emailIcon.style.color = "#b4b4b4";
          }
          if(input.value.match(pattern)){
            emailIcon.classList.replace("uil-envelope", "uil-check-circle");
            return emailIcon.style.color = "#4bb543"
          }
          emailIcon.classList.replace("uil-check-circle", "uil-envelope");
          emailIcon.style.color = "#de0611"
        })
</script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</body>
</html>
