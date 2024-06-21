<?php

  if (isset($_POST['submit'])) {

    include_once('config.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, cpf, usuario, senha) VALUES ('$nome', '$cpf', '$usuario', '$senha')";

    $result = $conexao->query($sql);


    if(mysqli_num_rows($result) < 1)
    {
      print_r("Não existe");
    }
    else
    {
      print_r("Existe");
    }

    $conexao->close();

  }
?>


<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="styles2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
</head>
<body>
    <script src="script3.js"></script>
  <div class="container">
    <h1 class="title">Cadastro</h1>
    <p class="subtitle">Preencha o formulário por completo</p>
    <form action="cadastro.php" method="POST">
      <input class="input" type="text" name="nome" placeholder="Nome completo" required>
      <input class="input" type="text" name="cpf" placeholder="CPF" required>
      <input class="input" type="text" name="usuario" placeholder="Usuário" required>
      <input class="input" type="password" name="senha" placeholder="Senha" required>
      <button class="button" type="submit" name="submit">Cadastrar-se</button>
    </form>
    <p class="text">
      Volte para o <a href="main.html" class="link">login</a>.
    </p>
  </div>
</body>
</html>
