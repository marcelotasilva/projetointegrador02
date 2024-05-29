<?php require "cabecalho_ln.php"; ?>
<style>
  a{
    color: white;
  }
</style>

<div class="login-box">
    <h2>Login Usuario</h2>
    <form action="projeto_login.php" method="post">
      <div class="user-box">
        <input type="text" name="email" id="email" required="">
        <label for="id_email">E-mail</label>
      </div>
      <div class="user-box">
        <input  type="password" name="senha" id="senha" required="">
        <label for="id_senha">Senha</label>
      </div>

        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <button type="submit" class="beautiful-button" class="button">Entrar</button>
    </form>
    <br>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<?php require "rodape.php"; ?>