<?php
require_once("config.php");
session_start();
$geral = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_login"));
if(isset($_SESSION["usuario_id"])){
    $v = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$_SESSION['usuario_login']}' AND senha = '{$_SESSION['usuario_senha']}'");
    if(mysqli_num_rows($v) == 1) {
        ?>
        <script language= "JavaScript">
        location.href="admin/index.php"
        </script>
    <?php }
return false;
}


?>
<!doctype html>
<html lang="pt-br" class="<?php echo $geral["tema"]; ?>">

<head><meta charset="gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Sergio Lima">

    <title>Logar · <?php echo $geral["nome"]; ?></title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="img/<?php echo $geral["logo"]; ?>" alt="logo">
            <h1><span class="font-weight-light">Go</span>Fruit</h1>
            <div class="laoderhorizontal"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
    <div class="row no-gutters vh-100 proh bg-template">
        <img src="img/<?php echo $geral["imagem"]; ?>" alt="logo" class="apple right-image align-self-center">
        <div class="col align-self-center px-3 text-center">
            <img src="img/<?php echo $geral["logo"]; ?>" alt="logo" class="logo-small">
            <h2 class="text-white "><span class="font-weight-light">Painel</span> Administrativo</h2>
            <form class="form-signin shadow" method="post" action="verifica_login.php">
                <?php
				    if(isset($_GET["msg"])) {
				?>
				    <span class=""><?php echo utf8_decode($_GET["msg"]); ?></span>
				<?php } ?>
                <div class="form-group float-label">
                    <input type="email" id="inputEmail" name="email" class="form-control" required autofocus>
                    <label for="inputEmail" class="form-control-label">E-mail</label>
                </div>

                <div class="form-group float-label">
                    <input type="password" name="senha" id="inputPassword" class="form-control" required>
                    <label for="inputPassword" class="form-control-label">Senha</label>
                </div>

                <div class="form-group my-4 text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme">Lembrar de mim</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-default btn-rounded shadow"><span>Entrar</span><i class="material-icons">arrow_forward</i></button>
                    </div>
                    <div class="col align-self-center text-right pl-0">
                        <a href="forgot-password.html">Esqueceu a senha?</a>
                    </div>
                </div>
            </form>
            <p class="text-center text-white">
                Nao tem uma conta?<br>
                <a href="registrar.php">Registre  agora.</a>
            </p>
        </div>
    </div>

    <!-- jquery, popper and bootstrap js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>     <script src="vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- cookie js -->
    <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- swiper js -->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- template custom js -->
    <script src="js/main.js"></script>

</body>

</html>
