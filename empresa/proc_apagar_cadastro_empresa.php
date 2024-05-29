<?php
session_start();
require "../conecta_bd.php";
if (array_key_exists('email', $_POST) && array_key_exists('senha', $_POST)) {
    $res = $db->query("SELECT * FROM empresas WHERE email = '{$_POST['email']}'");
    $linha = $res->fetch();
    if ($linha && $linha['senha'] === $_POST['senha']) {
        $_SESSION['id_empresa'] = $linha['id_empresa'];
        $empresa = $linha;
    }
}
if (array_key_exists('id_empresa', $_SESSION) && $_SESSION['id_empresa'] && !isset($empresa)) {
    $res = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
    $empresa = $res->fetch();
}
if (isset($empresa)) { ?>
    <?php require '../cabecalho_lx.php' ?>
    <h1>O cadastro:</h1>
    <h1><?php echo "Da empresa com nome: " . $empresa['nome_fantasia'] ?></h1>
    <h1><?php echo "E com E-mail: " . $empresa['email'] ?></h1>
    <?php

    // Seleciona os currículos relacionados à empresa
    $query = "SELECT curriculos.id_curriculo, curriculos.usuarios_id_usuario, curriculos.vagas_id_vaga, usuarios.nome, usuarios.email, vagas.tipo_vaga, vagas.descricao
FROM curriculos
JOIN usuarios ON curriculos.usuarios_id_usuario = usuarios.id_usuario
JOIN vagas ON curriculos.vagas_id_vaga = vagas.id_vaga
WHERE vagas.empresas_id_empresa = :id_empresa";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_empresa', $empresa['id_empresa']);
    $stmt->execute();
    $curriculos_associados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Itera sobre os currículos associados e os exclui
    foreach ($curriculos_associados as $curriculo) {
        $stmt = $db->prepare("DELETE FROM curriculos WHERE id_curriculo = :id_curriculo");
        $stmt->bindParam(':id_curriculo', $curriculo['id_curriculo']);
        $stmt->execute();
    }

    // Em seguida, exclui as vagas relacionadas à empresa
    $stmt = $db->prepare("DELETE FROM vagas WHERE empresas_id_empresa = :id_empresa");
    $stmt->bindParam(':id_empresa', $empresa['id_empresa']);
    $stmt->execute();

    // Prepara e executa a exclusão da empresa na tabela 'empresas'
    $stmt = $db->prepare("DELETE FROM empresas WHERE id_empresa = :id_empresa");
    $stmt->bindParam(':id_empresa', $empresa['id_empresa']);
    $linhas_afetadas = $stmt->execute();



    // Verifica se a exclusão foi bem-sucedida e realiza as ações correspondentes    
    if ($linhas_afetadas > 0) {
        echo '<h1>Foi removido com sucesso!</h1><br>';
        session_destroy();
    } else {
        echo '<h1>Nenhuma linha foi afetada!</h1>';
    } ?>
    <?php require '../fim.php'; ?>
<?php
} else {
?>
    <script>
        window.location.href = "login.php";
    </script>
<?php
} // fim do if
?>
<style>
    p{
        color: white;
    }
</style>