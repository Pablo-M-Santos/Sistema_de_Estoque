<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: estoque.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

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

    <title>Login | Controle de estoque</title>
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
        <form id="login_form" method="POST" action="index.php">
            <!-- FORM HEADER -->
            <div id="form_header">
                <h1>Login</h1>
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
                            <input type="password" id="password" name="senha">
                        </div>
                    </label>

                    <!-- FORGOT PASSWORD -->
                    <div id="forgot_password">
                        <a href="#">
                            Forgot your password?
                        </a>
                        <p>
                            Não possui uma conta? <a href="cadastro.php"><span>Cadastre-se</span></a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- LOGIN BUTTON -->
            <button type="submit" id="login_button">
                Login
            </button>
        </form>
    </main>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>