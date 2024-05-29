<?php require "cabecalho_ln.php"; ?>
<style>
    a {
        color: white;
    }
</style>
<div class="login-box">
    <h2>Cadastro Usuario</h2>
    <form action="cadastro.php" method="post">
        <div class="user-box">
            <input type="text" name="nome" id="id_nome" required="">
            <label for="id_nome">Nome</label>
        </div>
        <div class="user-box">
            <input type="text" name="email" id="id_email" required="">
            <label for="id_email">E-mail</label>
        </div>
        <div class="user-box">
            <input type="text" name="senha" id="id_senha" required="">
            <label for="id_senha">Senha</label>
        </div>
        <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <button type="submit" class="beautiful-button" class="button">cadastrar</button>
        </a>
    </form>
</div>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<?php require "../rodape.php"; ?>