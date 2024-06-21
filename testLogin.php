<?php 
session_start();

if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    include_once('config.php');
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if(mysqli_num_rows($result) < 1) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        $_SESSION['erro'] = 'Usuário ou senha incorretos.';
        header('Location: login.php');
    } else {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        header('Location: cameras.php');
    }
} else {
    $_SESSION['erro'] = 'Por favor, preencha todos os campos.';
    header('Location: login.php');
}
?>
