<?php require 'proc_login_sem_bem_vindo.php'; ?>
<?php require 'cabecalho_pvg.php'; ?>
<br><br>
<h1>Informações do Usuário</h1>
</th>
<div class="table-container">
    <table id="customers">
    <?php require 'titulo_tabela.php'; ?>
        <?php
        // Conecta no banco de dados
        require "../conecta_bd.php";
        if (array_key_exists('id_usuario', $_SESSION) && $_SESSION['id_usuario'] && !isset($usuario)) {
            $res = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
            $usuario = $res->fetch();
        }
        $consulta = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
        $usuarios = $consulta->fetchAll();
        require 'registro_tabela.php';
        ?>
    </table>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require 'rodape.php'; ?>