<?php require 'proc_login_empresa_sem_bem_vindo.php';
include '../cabecalho_empresa.php';
?><br><br>
<h1>Informações da Empresa</h1>
</th>
<div class="table-container">
    <table id="customers">
        <?php require 'titulo_tabela_empresa.php'; ?>
        <?php
        // Conecta no banco de dados
        require "../conecta_bd.php";
        if (array_key_exists('id_empresa', $_SESSION) && $_SESSION['id_empresa'] && !isset($empresas)) {
            $res = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
            $empresa = $res->fetch();
        }
        $consulta = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
        $empresas = $consulta->fetchAll();
        require 'registro_tabela_empresa.php';
        ?>
    </table>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require 'rodape.php'; ?>