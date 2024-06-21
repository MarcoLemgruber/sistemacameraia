<?php
session_start(); // Inicia a sessão
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
</head>
<body>
    <script src="script3.js"></script>
  <div class="container">
    <h1 class="title">Login</h1>
    <div class="icon-container">
      <i class="far fa-user-circle user-icon <?php echo isset($_SESSION['erro']) && !empty($_SESSION['erro']) ? 'error' : ''; ?>"></i>
    </div>
    <?php if(isset($_SESSION['erro']) && !empty($_SESSION['erro'])): ?>
      <p class="error-message"><?php echo $_SESSION['erro']; ?></p>
      <?php unset($_SESSION['erro']); // Limpa a mensagem de erro após exibir ?>
    <?php endif; ?>
    <form action="testLogin.php" method="POST">
      <input class="input" type="text" name="usuario" placeholder="Usuário" required>
      <input class="input" type="password" name="senha" placeholder="Senha" required>
      <input class="button" name="submit" type="submit" value="Enviar"></input>
    </form>
    <p class="text">
      Não tem login? <a href="cadastro.php" class="link">cadastre-se aqui.</a>
    </p>
    <p class="text">
      <a href="#" class="link">Esqueceu a senha?</a>
    </p>
  </div>
</body>
</html>
