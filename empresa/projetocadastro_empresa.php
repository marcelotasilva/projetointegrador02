<?php require "cabecalho_cadastro.php"; ?>
<style>
    a {
        color: white;
    }
</style>
<div class="login-box">
    <h2>Cadastro Empresa</h2>
    <form action="proc_cad_empresa.php" method="post">
        <div class="user-box">
            <input type="text" name="nome_fantasia" id="nome_fantasia" required="">
            <label>Nome fantasia</label>
        </div>
        <div class="user-box">
            <input type="text" name="email" id="email" required="">
            <label>E-mail</label>
        </div>
        <div class="user-box">
            <input type="password" name="senha" id="senha" required="">
            <label>Senha</label>
        </div>
        <div class="user-box">
            <input type="text" name="cnpj" id="cnpj" required="">
            <label>CNPJ</label>
        </div>
        <div class="user-box">
            <input type="text" name="inscricao_estadual" id="inscricao_estadual" required="">
            <label>Inscricao Estadual</label>
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
<?php require "rodape.php"; ?>