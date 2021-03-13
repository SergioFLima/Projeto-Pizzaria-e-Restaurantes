<?php 
require_once("config.php"); 
$geral = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_login"));
if(isset($_SESSION["usuario_id"])){
    $v = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$_SESSION['usuario_login']}' AND cpf = '{$_SESSION['usuario_senha']}'"));
    ?>
    <script language= "JavaScript">
    location.href="index.php"
    </script>
    <?php
return false;
}
else{
    session_start();
}
$codigo = rand(10000, 99999);
?>
<!doctype html>
<html lang="pt-br" class="<?php echo $geral["tema"]; ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Registrar · <?php echo $geral["nome"]; ?></title>

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
        <div class="col align-self-center px-3  text-center">
            <img src="img/<?php echo $geral["logo"]; ?>" alt="logo" class="logo-small">
            <h2 class="text-white"><span class="font-weight-light"></span>Registrar</h2>
            <form class="form-signin shadow" action="admin/req/registrar.php" method="POST">
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                <div class="form-group float-label active">
                    <input type="text" name="nome" id="nome" class="form-control" required >
                    <label class="form-control-label">Nome</label>
                </div>
                
                <div class="form-group float-label">
                    <input type="email" name="email" id="email" class="form-control" required autofocus>
                    <label for="email" class="form-control-label">Endereço de E-mail</label>
                </div>

                <div class="row" id="oculta">
                    <div class="col-auto">
                        <button onclick="envia_codigo()" class="btn btn-lg btn-default btn-rounded shadow"><span>Continuar</span><i class="material-icons">arrow_forward</i></button>
                    </div>
                </div>
                <div style="display: none" id="mostra">
                    <div class="form-group float-label">
                        <input type="text" name="confirma_senha" id="confirma_senha" class="form-control" required>
                        <label for="confirma_senha" class="form-control-label">Código de Verificação</label>
                    </div>

                    <div class="form-group float-label">
                        <input type="password" name="senha" id="inputPassword" class="form-control" required>
                        <label for="inputPassword" class="form-control-label">Senha</label>
                    </div>

                    <div class="form-group my-4 text-left">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Eu aceito os <a href="#">Termos e condiçôes</a></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-lg btn-default btn-rounded shadow"><span>Cadastrar</span><i class="material-icons">arrow_forward</i></button>
                        </div>
                    </div>
                </div>
            </form>
            <p class="text-center text-white">
                Já tem uma conta?<br>
                <a href="login.php">Entre Aqui</a>
            </p>
        </div>
    </div>

    <!-- jquery, popper and bootstrap js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>     <script src="vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- cookie js -->     <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- swiper js -->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- template custom js -->
    <script src="js/main.js"></script>
    <script>
            function envia_codigo(){
                nome = document.getElementById("nome");
                email = document.getElementById("email");
                codigo = "<?php echo $codigo; ?>";
                $.ajax({
					type:'POST',
					data:'nome='+nome+'&email='+email+'&codigo='+codigo,
					url:'admin/req/confirma_email.php',
					success: function(msg){
                        
                        document.getElementById("oculta").style.display = "none";
                        document.getElementById("mostra").style.display = "block";
					}
				});
            }
    </script>

</body>

</html>
