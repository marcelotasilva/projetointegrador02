<?php
require 'proc_login_sem_bem_vindo.php';
require 'cabecalho_pvg.php';
?>

<style>
    .tab_cadastro {
        margin: 0 auto;
        text-align: right;
        color: white;
    }
</style>

<h1>Atualizar Senha</h1>
<div class="page">
    <form action="proc_cad_telefone.php" method="post" class="formLogin">
        <table class="tab_cadastro">
            <tr>
                <th><label for="id_telefone">Telefone:</label></th>
                <th><input type="text" name="telefone" id="id_telefone" value=""></th>
            </tr>
        </table>
        <button type="submit" class="button">Cadastrar Telefone</button>
    </form>
</div>

<br><br>
<?php require 'rodape.php'; ?>