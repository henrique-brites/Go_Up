<?php
  session_start();
  include_once("conexao.php");
    $config = mysqli_fetch_assoc(mysqli_query( $conectar, "SELECT * FROM config WHERE status = 1 ORDER BY 'id'"));
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Área Usuário Cadastrado - <?=$config['titulo'];?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>
  <?php
    unset($_SESSION['usuarioId'],     
          $_SESSION['usuarioNome'],     
          $_SESSION['usuarioNivelAcesso'], 
          $_SESSION['usuarioEmail'],    
          $_SESSION['usuarioSenha']);
  ?>
    <div class="container">   
      <form class="form-signin" method="POST" action="valida_login.php">
        <h2 class="form-signin-heading text-center">Área para Usuário Cadastrado</h2>
        <label for="inputEmail" class="">E-mail</label>
    
        <input type="email" name="email" class="form-control" placeholder="Digitar o E-mail" required autofocus><br />
    
        <label for="inputPassword" class="">Senha</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite a Senha" required >

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogin" value="Acessar">Acessar</button>
      </form>
      
    <p class="text-center text-danger">
      <?php
        if(isset($_SESSION['loginErro'])){
          echo $_SESSION['loginErro'];
          unset($_SESSION['loginErro']);
        }
        if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
    </p>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

