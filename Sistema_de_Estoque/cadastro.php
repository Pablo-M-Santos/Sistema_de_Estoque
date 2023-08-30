<?php
include('conexao.php');

if (isset($_POST['cadastrar'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($mysqli->query($sql)) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Cadastro | Controle de estoque</title>
</head>

<body>
    <header>
        <h2 class="logo"><a href="index.php">Logo</a></h2>
        <nav>
            <ul class="nav_links">
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="index.php">Login</a></li>
                <li><a href="estoque.php">Estoque</a></li>
            </ul>
        </nav>
    </header>


    <main id="container">
        <form id="login_form" method="POST" action="cadastro.php">
            <!-- FORM HEADER -->
            <div id="form_header">
                <h1>Cadastro</h1>
                <i id="mode_icon" class="fa-solid fa-moon"></i>
            </div>

            <!-- SOCIAL MEDIA LINKS -->
            <div id="social_media">
                <!-- FACEBOOK -->
                <a href="#">
                    <img src="assets/imgs/facebook.png" alt="">
                </a>

                <!-- GOOGLE -->
                <a href="#">
                    <img src="assets/imgs/google.png" alt="Google logo">
                </a>

                <!-- GITHUB -->
                <a href="#">
                    <img src="assets/imgs/github.png" alt="">
                </a>
            </div>

            <!-- INPUTS -->
            <div id="inputs">
                <!-- NAME -->
                <div class="input-box">
                    <label for="name">
                        Name
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="name" name="nome">
                        </div>
                    </label>
                </div>

                <!-- EMAIL -->
                <div class="input-box">
                    <label for="email">
                        E-mail
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" name="email">
                        </div>
                    </label>
                </div>

                <!-- PASSWORD -->
                <div class="input-box">
                    <label for="password">
                        Password
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" name="senha" id="password">
                        </div>
                    </label>

                    <!-- FORGOT PASSWORD -->
                    <div id="forgot_password">
                        <a href="#">
                            Forgot your password?
                        </a>
                    </div>
                </div>
            </div>

            <!-- CADASTRO BUTTON -->
            <button type="submit" id="login_button" name="cadastrar"> Cadastre-se
            </button>
            
            <p>
                Já possui uma conta? <a href="index.php"><span>Faça Login</span></a>
            </p>
        </form>
    </main>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>